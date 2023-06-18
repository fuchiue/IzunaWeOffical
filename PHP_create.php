<?php
// DB接続
require_once "./data.php";
// オーナIDあるかを確認
session_start();
if (!isset($_SESSION["OWNER_ID"])) {
    header("Location: ./login_page_Host.php");
}
// POSTかを確認
if( $_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: create_event.php");
    exit();
}

$owner_id = $_SESSION["OWNER_ID"];

$submit = filter_input(INPUT_POST, "submit");

$result = [
    "status"  => true, //エラーがあった場合  false
    "message" => "", //表示するメッセージ
    "result"  => null, //更新結果(件数)
];

// イベント内容をデータベースに追加
if(isset($submit)){

    $event_name = filter_input(INPUT_POST,"event_name");
    $theme = filter_input(INPUT_POST,"theme");
    $note = filter_input(INPUT_POST,"note");
    $prefecture = filter_input(INPUT_POST,"prefecture");
    $address1 = filter_input(INPUT_POST,"address1");
    $address2 = filter_input(INPUT_POST,"address2");
    $icon = filter_input(INPUT_POST,"icon");
    $schedule = filter_input(INPUT_POST,"schedule");
    $hour = filter_input(INPUT_POST,"hour");

    $sql = "INSERT INTO EVENT(EVENT_NAME, THEME, NOTE, PREFECTURE, ADDRESS, ICON, SCHEDULE, HOUR, OWNER_ID) VALUES(:event_name, :theme, :note, :prefecture, :address, :icon, :schedule, :hour, :owner_id)";


    try{
        $stmt = abc()->prepare($sql);
        $stmt->bindParam(":event_name", $event_name, PDO::PARAM_STR);
        $stmt->bindParam(":theme", $theme, PDO::PARAM_STR);
        $stmt->bindParam(":note", $note, PDO::PARAM_STR);
        $stmt->bindParam(":prefecture", $prefecture, PDO::PARAM_STR);
        $stmt->bindParam(":address", $prefecture.$address1.$address2, PDO::PARAM_STR);
        $stmt->bindParam(":icon", $icon, PDO::PARAM_STR);
        $stmt->bindValue(":schedule", $schedule, PDO::PARAM_STR);
        $stmt->bindParam(":hour", $hour, PDO::PARAM_INT);
        $stmt->bindParam(":owner_id", $owner_id, PDO::PARAM_INT);
        echo $sql;
        // execute : SQL の実行
        $stmt -> execute();

        $result["result"] = [];
        // fetch:1列
        while($rows = $stmt -> fetch(PDO::FETCH_ASSOC)){
            $result["result"][] = $rows;
        }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

}



if($result["status"] == true){
    try{
        $db = new PDO($dsn, "root", "root");

        $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $db -> beginTransaction();

        $stmt = $db->prepare("INSERT INTO EVENT(EVENT_NAME, THEME, NOTE, PREFECTURE, ADDRESS, ICON, SCHEDULE, HOUR, OWNER_ID) VALUES(:event_name, :theme, :note, :prefecture, :address, :icon, :schedule, :hour, :owner_id)");

        $stmt->bindParam(":event_name", $event_name, PDO::PARAM_STR);
        $stmt->bindParam(":theme", $theme, PDO::PARAM_STR);
        $stmt->bindParam(":note", $note, PDO::PARAM_STR);
        $stmt->bindParam(":prefecture", $prefecture, PDO::PARAM_STR);
        $stmt->bindParam(":address", $address1, PDO::PARAM_STR);
        $stmt->bindParam(":icon", $icon, PDO::PARAM_STR);
        $stmt->bindValue(":schedule", $schedule, PDO::PARAM_STR);
        $stmt->bindParam(":hour", $hour, PDO::PARAM_INT);
        $stmt->bindParam(":owner_id", $owner_id, PDO::PARAM_INT);

        // TODO:debug
        // echo "SQL文:{$sql}{$where}";


        // execute : SQL の実行
         $stmt -> execute();

         $result["result"] = [];
        // fetch:1列
        while($rows = $stmt -> fetch(PDO::FETCH_ASSOC)){
            $result["result"][] = $rows;
        }
    }catch(PDOException $poe){
        exit("DBエラー".$poe -> getMessage());
    }finally{
        $stmt = null;
        $db  = null;
    }
}



?>



if(isset($_POST['submit'])) {//送信ボタンが押された場合
$icon = uniqid(mt_rand(), true);//ファイル名をユニーク化
$icon .= '.' . substr(strrchr($_FILES['icon']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
$file = "images/$icon";
$sql = "INSERT INTO EVENT(ICON) VALUES (:icon)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':icon', $icon, PDO::PARAM_STR);
        if (!empty($_FILES['icon']['name'])) {//ファイルが選択されていれば$iconにファイル名を代入
            move_uploaded_file($_FILES['icon']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }


    <?php if (isset($_POST[submit])): ?>
                    <p><?php echo $message; ?></p>
                <?php else: ?>
                    <?php endif;?>