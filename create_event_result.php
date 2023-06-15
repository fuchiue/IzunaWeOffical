<?php
require_once "./data.php";
if( $_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: create_event.php");
    exit();
  }

session_start();
// $owner_id = $_SESSION["ID"];

// ファイル関連の取得
$submit = filter_input(INPUT_POST, "submit");
$event_name = filter_input(INPUT_POST,"event_name");
$theme = filter_input(INPUT_POST,"theme");
$note = filter_input(INPUT_POST,"note");
$area = filter_input(INPUT_POST,"area");
$address1 = filter_input(INPUT_POST,"address1");
$address2 = filter_input(INPUT_POST,"address2");
$schedule = filter_input(INPUT_POST,"schedule");
$hour = filter_input(INPUT_POST,"hour",FILTER_VALIDATE_INT);
$addressAll = $area.$address1.$address2;
$detail = filter_input(INPUT_POST,"detail");
// var_dump($detail);

$owner_id = 100001;

// アップロードされたファイルの一時的な保存場所からファイルを取得し、保存先のディレクトリに移動させる
// var_dump($_FILES["icon"]["name"]);
if(isset($_FILES["icon"]) && $_FILES["icon"]["name"] != ""){
    $icon_tmp = $_FILES["icon"]["tmp_name"];
    // $icon_extension = pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);
    // $icon_name = uniqid() . "_" . $icon_extension; // 一意のファイル名を生成
    $icon_name = date('YmdHis') . "_" . $_FILES["icon"]["name"]; // 一意のファイル名を生成
    $icon_path = "./images/eventicon/" . $icon_name;

    // 画像ファイルかどうかをチェックする
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $icon_extension = strtolower(pathinfo($icon_name, PATHINFO_EXTENSION));
    $err_msg = "";
    
    if (in_array($icon_extension, $allowed_extensions)) {
        move_uploaded_file($icon_tmp, $icon_path);
        // データベースにパス名を保存する処理などを追加する
    } else {
        // 画像ファイルではない場合のエラーメッセージを表示するなどの処理を行う
        $err_msg = "添付ファイルは画像ではありません。";
    }
}
if(isset($err_msg)){
    $icon_path = null;
}
// 作成したイベント内容を保存
$result = eventSave($event_name, $theme, $note, $area, $addressAll, $icon_path, $schedule, $hour, $owner_id, $detail);
// ファイルデータを取得
// $event_info = getAllEvent();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/create_event_result.css">
    
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア -->
    <div id="UJ_header">
        <img src="./image/navbar1.jpg">
    </div>

    <!-- ページ名 -->
    <section id="UJ_Title">
            <h1>『　イベント制作　』</h1>
            <h2>Create New Event</h2>
    </section>

    <!-- 入力情報 -->
    <section id="enter_InfoArea">
        <div id="enter_BigInfoBox">
            <div class="enter_InfoBox">
                <label class="required">イベント名：</label>
                <p class="text" name="event_name" required><?= $event_name ?></p>
            </div>
            <div class="enter_InfoBox">
                <label class="required">日時：</label>
                <p class="text" name="schedule" required><?= $schedule ?></p>
            </div>
            <div class="enter_InfoBox">
                <label class="required">会場：</label>
                <div class="enterAddress">

                    <div class="enterAddress_Box">

                    <p>都道府県　</p>

                    <p class="text"" style="width:100px" name="area" required><?= $area ?></p>

                    </div>

                    <div class="enterAddress_Box">

                    <p>　市/区　</p>

                    <p class="text" style="width:100px" name="address1" required><?= $address1 ?></p>

                    </div>  

                </div>

                <p>丁目/番号</p><p class="text" name="address2" required><?= $address2 ?></p>
            </div>
            <div class="enter_InfoBox">
                <label class="required">活動内容：</label>
                <p class="text" name="note" required><?= $note ?></p>
            </div>
            <div class="enter_InfoBox">
                <label class="required">イベントテーマ：</label>
                <p class="text" name="theme"><?= $theme ?></p>
            </div>
            <div class="enter_InfoBox">
                <label class="required">平均活動時間：</label>
                <p class="text" name="hour" min="10" step="10" placeholder="（１０分単位）" required><?= $hour ?></p>
            </div>
            <div class="enter_InfoBox">
                <label class="required">募集詳細：</label>
                <?php
                if(isset($detail) && !empty($detail)){
                    echo '<p class="text" name="detail">' . $detail . '</p>';
                }else {
                    echo '<p class="text" name="detail">　</p>';
                }
                ?>
            </div>

            <!-- 写真 -->

            <!-- アップロードされた画像を表示 -->
            <div id="upload_PhotoBox">
            <?php
            // var_dump($icon_path);
            if(isset($icon_path) && empty($err_msg)){
                echo '<div id="uploaded_image">';
                echo '<img src="' . $icon_path . '" alt="アップロードされた画像" style="max-width: 600px; max-height: 600px;">';
                echo '</div>';
            }elseif(!empty($err_msg)){
                echo '<p style="color: red;">' . $err_msg . '</p>';
            }else{
                echo '<input type="file" name="icon" id="file" accept="image/*">';
                echo '<label for="file">写真＋</label>';
            }
            ?>
            </div>
        </div>

        <div id="enter_InfoBack">
            <button type="button" onclick="location.href='create_event.php'">戻る</button>
        </div>
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>