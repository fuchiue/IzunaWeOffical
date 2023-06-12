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
// if(isset($_FILES["icon"])){
//     $icon = file_get_contents($_FILES["icon"]["tmp_name"]);
// }
$schedule = filter_input(INPUT_POST,"schedule");
$hour = filter_input(INPUT_POST,"hour",FILTER_VALIDATE_INT);
$addressAll = $area.$address1.$address2;
$icon = "123";
// $hour = 60;
// var_dump($hour);
$owner_id = 100001;

// 作成したイベント内容を保存


$result = eventSave($event_name, $theme, $note, $area, $addressAll, $icon, $schedule, $hour, $owner_id);
var_dump($result);
// ファイルデータを取得
$event_info = getAllEvent();


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

        <!-- < foreach($event_info as $info) :?> -->
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
                    <p class="text" name="theme">
                            <?= $theme ?></p>
                    </p>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">平均活動時間：</label>
                    <p class="text" name="hour" min="10" step="10" placeholder="（１０分単位）" required><?= $hour ?></p>
                </div>

                <!-- 写真 -->
                <div id="upload_PhotoBox">
                    <input type="file" name="icon" id="file" accept="image/*">
                    <label for="file">写真＋</label>
                </div>
            </div>
            <div id="enter_InfoSubmit">
                <button onclick="location.href='create_event.php'">戻る</button>
            </div>
        <!--  endforeach?> -->
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>