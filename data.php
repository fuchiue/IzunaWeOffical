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
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,true);
        return $pdo;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
dbc();

$directory = "./images/eventicon/";

// ディレクトリが存在しない場合は作成する
if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}

/**
 * 作成したイベント内容を保存
 */
function eventSave($event_name, $theme, $note, $area, $addressAll, $icon, $schedule, $hour, $owner_id, $detail)
{
    $result = False;

    $pdo = dbc(); // PDO インスタンスを取得

    // トランザクションを開始
    $pdo->beginTransaction();

    $sql = "INSERT INTO EVENT(EVENT_NAME, THEME, NOTE, area, ADDRESS, ICON, SCHEDULE, HOUR, OWNER_ID, DETAIL) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try{
        // プリペアドステートメントを作成
        $stmt = $pdo->prepare($sql);

        // 画像ファイルかどうかをチェックする
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $err_msg = "";
        
        if($_FILES["icon"]["error"] === UPLOAD_ERR_OK){
            $icon_extension = strtolower(pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION));

            if (in_array($icon_extension, $allowed_extensions)) {
                // アップロードされたファイルの一時的な保存場所からファイルを取得し、保存先のディレクトリに移動させる
               $icon_tmp = $_FILES["icon"]["tmp_name"];
               $icon_name = date('YmdHis') . "_" . $_FILES["icon"]["name"];
               $icon_path = "./images/eventicon/" . $icon_name;
               move_uploaded_file($icon_tmp, $icon_path);
               // データベースにパス名を保存する処理などを追加する
           } else {
               $icon_path = ""; // 画像でない場合はnullにする
           }
        }

        // パラメータをバインド
        $stmt->bindParam(1, $event_name,PDO::PARAM_STR);
        $stmt->bindParam(2, $theme,PDO::PARAM_STR);
        $stmt->bindParam(3, $note,PDO::PARAM_STR);
        $stmt->bindParam(4, $area, PDO::PARAM_STR);
        $stmt->bindParam(5, $addressAll, PDO::PARAM_STR);
        $stmt->bindValue(6, $icon_path, PDO::PARAM_STR);
        $stmt->bindValue(7, $schedule, PDO::PARAM_STR);
        $stmt->bindParam(8, $hour, PDO::PARAM_INT);
        $stmt->bindParam(9, $owner_id, PDO::PARAM_INT);
        if($detail){ 
            $stmt->bindParam(10, $detail, PDO::PARAM_STR); 
        }else{
            $detail = "";
            $stmt->bindParam(10, $detail, PDO::PARAM_STR); 
        }
        // $icon_pathがnullでない場合にのみパラメータをバインド
        // if ($icon_path !== null) {
        //     $stmt->bindParam(6, $icon_path, PDO::PARAM_STR);
        // } else {
        //     $stmt->bindValue(6, null, PDO::PARAM_NULL);
        // }
        // クエリを実行
        $stmt->execute();

        // コミット
        $pdo->commit();

        $result = true;
        return $result;
        
    }catch(\Exception $e) {
        // ロールバック
        $pdo->rollBack();

        echo $e->getMessage();
        return $result;
    }
}

/**
 * ファイルデータを取得
 * @return array $eventData
 */
function getAllEvent()
{
    $sql = "SELECT * FROM EVENT";

    $eventData = dbc()->query($sql);

    return $eventData;
}

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}