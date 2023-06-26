<?php
require_once "./data.php";

session_start();

//数値入力電話番号
if (preg_match("/[^0-9]/", $_POST['tel'])) {
    echo "数値以外が入力されています。";
}

// データベース接続
$pdo = dbc();

//パスワード確認
$password = $_POST["password"];
$password_K = $_POST["password_K"];
if($password != $password_K){
    echo "パスワードが一致しません";
}

//メールアドレスとパスワードの重複を防ぐ
$email = $_POST["email"];

$UserQuery = "SELECT * FROM user WHERE email = :email";
$UserStmt = $pdo->prepare($UserQuery);
$UserStmt->bindValue(':email', $email, PDO::PARAM_STR);
$UserStmt->execute();

if ($UserStmt->rowCount() > 0) {
    echo "このメールアドレスは既に登録されています。別のメールアドレスを使用してください。";
}

// 画像のアップロード処理
//保存先のディレクトリー
$target_dir = "./image/";
var_dump($_FILES);
//ファイルが指定されたディレクトリに保存されます。
$target_file = $target_dir . basename($_FILES["img"]["name"]);

// 画像をサーバーにアップロード
if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
    echo "画像のアップロードに成功しました。";

    // データベースに保存
    try {
        $sql = "INSERT INTO user(
            USER_NAME,
            NICKNAME,
            NOTE,
            BIRTHDAY,
            ADDRESS,
            GENDER,
            ICON,
            TEL,
            EMAIL,
            PASSWORD
        ) VALUES (
            :USER_NAME,
            :NICKNAME,
            :NOTE,
            :BIRTHDAY,
            :ADDRESS,
            :GENDER,
            :ICON,
            :TEL,
            :EMAIL,
            :PASSWORD
        )";

        $stmt = $pdo->prepare($sql);

        $user_name = $_POST["family_name"] . $_POST["name"];

        $stmt->bindValue(":USER_NAME", $user_name, PDO::PARAM_STR);
        $stmt->bindValue(":NICKNAME", $_POST["nickname"], PDO::PARAM_STR);
        $stmt->bindValue(":NOTE", $_POST["introduction"], PDO::PARAM_STR);
        $stmt->bindValue(":BIRTHDAY", $_POST["birthday"], PDO::PARAM_STR);  //2021/09/09
        $stmt->bindValue(":ADDRESS", $_POST["prefecture"] . $_POST["city"] . $_POST["chome"], PDO::PARAM_STR);
        $stmt->bindValue(":GENDER", $_POST["gender"], PDO::PARAM_STR);
        $stmt->bindValue(":ICON", $target_file, PDO::PARAM_STR);
        $stmt->bindValue(":TEL", $_POST["tel"], PDO::PARAM_STR);
        $stmt->bindValue(":EMAIL", $_POST["email"], PDO::PARAM_STR);
        $stmt->bindValue(":PASSWORD", $_POST["password"], PDO::PARAM_STR);

        $stmt->execute();
        echo "データが正常に保存されました。";
        $pdo->commit(); // 成功したらコミット

        $sql = "SELECT USER_ID from USER ORDER BY USER_ID DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $result['USER_ID'];

        // リダイレクト
        header("Location: ./userpage_AfterLogin.php");
        exit();
    } catch (PDOException $e) {
        exit("データの保存中にエラーが発生しました: " . $e->getMessage());
        $pdo->rollBack(); // 失敗したらロールバック
    }
} else {
    echo "画像のアップロード中にエラーが発生しました。";
}