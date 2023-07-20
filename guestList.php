<?php
session_start();
require_once "./data.php";
$id = $_SESSION["id"]; //IDを取得

$eventId = 30008;
// $eventId = $_GET["eventId"];

$eventDatas = Getevent($eventId); //イベントの情報を取得
$Getguest = Getguest($eventId);

$hostdata = hostGetData($id); //ホストの情報を取得
$registers = GetRegister($id); //参加応募者一覧を取得
$photodatas = TakePostData($id); //投稿した写真を取得

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/guestList.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア ＋ ページ名 -->
    <div id="guestlist_header">
        <img src="./image/navbar1.jpg">
        <div id="guestlist_tilte">
            <h1>ゲストリスト</h1>
            <p>Participant List</p>
        </div>
    </div>

    <!-- QRcodeエリア -->
    <div class="qrcode">
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://click.ecc.ac.jp/ecc/sys2_se2a_a/login_user_QR.php/&size=100x100" alt="QRコード" />
    </div>

    <form action="#" method="POST">
    <div  class="list-area">
    <?php foreach($Getguest as $guest): ?>
    
        <div class="small-area">
            <img src="<?= $guest['ICON'] ?>" alt="">
            <p><?= $guest['USER_NAME'] ?></p>
            <p class="status"><?= $guest['STATUS'] ?></p>
        </div>
    <?php endforeach; ?>
    </div>
        

    
    </form>



    

    <?php include('./Navbar/footer.php'); ?>

    <a></a> <!-- To Top Apple Button-->

    <script src="./js/navbar.js"></script>
    <script src="./js/hostpage_AfterLogin.js"></script>
</body>

</html>