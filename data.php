<?php
//require_once "./data.php";
//上記コードをファイルの最初に入れればデータベース接続できる
function dbc()
{
    $host = "localhost";
    $dbname = "izanadb";
    $user = "root";
    $pass = "root";
    $dns = "mysql:host=$host;dbname=$dbname;charset=utf8";
    try {
        $pdo = new PDO(
            $dns,
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
dbc();

//ユーザのログイン
function UserLogin($username,$password)
{
    if ($username != null && $password != null) {
        try { // トランザクション開始
            $pdo=dbc();
            if (strpos($username, '@')) {
                $sql = "SELECT * FROM USER WHERE EMAIL=:username";
            } else {
                $sql = "SELECT * FROM USER WHERE USER_NAME=:username";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && $result["PASSWORD"] === $password) {
                // ユーザー番号をセッションに登録
                $_SESSION["id"] = $result["USER_ID"];
                echo $_SESSION["id"];
                header("Location: userpage_AfterLogin.php");
                //ユーザのマイページに移行する
            } else {
                $msg="ユーザー名またはパスワードが正しくありません";
                header("Location: login_page_User.php?msg=$msg");
            }
            $pdo->commit();
        } catch (PDOException $poe) {
            $pdo->rollBack();
            echo "DB 接続エラー" . $poe->getMessage();
        } finally {
            $stmt = null;
            $pdo = null;
        }

    }
}

//オーナのログイン
function HostLogin($username,$password)
{
    if ($username != null && $password != null) {
        try { // トランザクション開始
            $pdo=dbc();
            if (strpos($username, '@')) {
                $sql = "SELECT * FROM OWNER WHERE EMAIL=:username";
            } else {
                $sql = "SELECT * FROM OWNER WHERE OWNER_NAME=:username";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && $result["PASSWORD"] === $password) {
                echo $result;
                // ユーザー番号をセッションに登録
                $_SESSION["id"] = $result["OWNER_ID"];
                echo $_SESSION["id"];
                header("Location: hostpage_AfterLogin.php");
                //ユーザのマイページに移行する
            } else {
                $msg="ユーザー名またはパスワードが正しくありません";
                header("Location: login_page_Host.php?msg=$msg");
            }
            $pdo->commit();
        } catch (PDOException $poe) {
            $pdo->rollBack();
            echo "DB 接続エラー" . $poe->getMessage();
        } finally {
            $stmt = null;
            $pdo = null;
        }

    }
}

//ユーザのデータの取得
function TakeUserData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT POINT,NICKNAME,NOTE FROM USER WHERE USER_ID=:userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $userdata = $stmt->fetch();
    return $userdata;
}

//投稿写真の取得
function TakePostData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT PHOTO,OWNER_ID FROM POST WHERE USER_ID=:userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $postdata = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $postdata;
}
function TakeEventData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT EVENT_ID,ICON,EVENT_NAME,ADDRESS,THEME FROM EVENT WHERE EVENT_ID IN (SELECT EVENT_ID FROM JOINED WHERE USER_ID=:userid AND STATUS='参加済み')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $eventdata = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $eventdata;
}