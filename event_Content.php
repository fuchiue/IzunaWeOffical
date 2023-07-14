<?php
require_once "./data.php";
session_start();

$id = $_GET["eventId"]; //前ページで選択された項目のidを取得する
$eventdata = Getevent($id);
$hostdata = hostGetData($eventdata['OWNER_ID']); //ホストの情報を取得

$buttonhidden = false; //応募ボタン非表示フラグ
$eventstuts = false; //募集中ならfalse　終了ならtrue
$ownerflag = false;
$eventjoin = 0;

//セッションからIDを取得
if (isset($_SESSION["id"])) {
    $loginid = $_SESSION["id"];
}

//IDに値が入っているか確認
if (isset($loginid)) {
    //ホストでログインしているため応募ボタン非表示フラグをtrueに
    if (strlen((int)$loginid) == 6) {
        $buttonhidden = true;
    } else {
        $eventjoin = checkjoin($loginid, $id);
        $eventjoin = $eventjoin['COUNT(*)'];
    }
    //ホストIDとログインIDが一緒ならフラグを立てておく
    if ($loginid == $eventdata['OWNER_ID']) {
        $ownerflag = true;
    }
}
//ステータスが終了の場合応募ボタンを非表示フラグをtrueに
if ($eventdata['STATUS'] == "終了") {
    $buttonhidden = true;
}



// echo "<pre>";
// print_r($eventdata);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/event_Content.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア -->
    <div id="EV_header">
        <img src="./image/navbar1.jpg">
    </div>

    <!-- ページ名 + イベントの写真(データ) -->
    <section id="EV_Title">

        <h1>『　イベントの詳細　』</h1>
        <h2>Event Details</h2>


        <div>
            <img src="<?= $eventdata["ICON"]; ?>">
        </div>

    </section>


    <!-- イベント詳細 -->

    <section id="event_BigDetails">

        <div id="event_Box1">
            <div class="event_InfoTitle">
                <p class="EV_Small_Title">イベント名：</p>
                <p class="EV_Small_Title">活動テーマ：</p>
                <p class="EV_Small_Title">活動内容：</p>
                <p class="EV_Small_Title">日時：</p>
                <p class="EV_Small_Title">平均活動時間/分：</p>
                <p class="EV_Small_Title">活動場所：</p>

            </div>


            <div class="event_SmallContent">
                <p id="eventName"><?= $eventdata["EVENT_NAME"]; ?></p>
                <p id="eventTheme"><?= $eventdata["THEME"]; ?></p>
                <p id="eventInfo"><?= nl2br($eventdata["NOTE"]); ?></p>
                <p id="eventTime"><?= $eventdata["SCHEDULE"]; ?></p>
                <p id="eventHour"><?= $eventdata["HOUR"]; ?>分</p>
                <p id="eventPlace"><?= $eventdata["ADDRESS"]; ?></p>
            </div>
        </div>
        <!-- Detailはない場合があるためIFで判定する必要がある -->
        <?php if (isset($eventdata["DETAIL"])) : ?>
            <div id="detailBox">
                <div class="event_InfoTitle">
                    <p class="EV_Small_Title">募集詳細：</p>
                </div>
                <div class="event_SmallContent">
                    <p id="eventDetail"><?= nl2br($eventdata["DETAIL"]); ?></p>
                </div>
            <?php endif; ?>

            </div>

            <div id="event_Box2" <?php if ($buttonhidden || $eventstuts) {
                                        echo "hidden";
                                    } ?>>
                <!--  ***** ページの担当へ：PHPでイベントのstatusを参照して、応募ボタンをhiddenかどうか***** -->
                <?php if ($eventjoin == 0) : ?>
                    <a href="userJoin.php?eventId=<?= $_GET["eventId"]; ?>" id="joinEventBtn">
                        <p id="submitBtn">応募</p>
                    </a>
                <?php else : ?>
                    <a id="joinEventBtn">
                        <p id="submitBtn">応募済み</p>
                    </a>
                <?php endif; ?>
            </div>
            <?php if ($ownerflag) : ?>
                <div id="event_Box2">
                    <?php if ($eventdata['STATUS']=="募集中") : ?>
                        <a href="endEvent.php?eventId=<?= $_GET["eventId"]; ?>" id="joinEventBtn">
                            <p id="submitBtn">募集を終了する</p>
                        </a>
                    <?php else : ?>
                        <a href="restartEvent.php?eventId=<?= $_GET["eventId"]; ?>" id="joinEventBtn">
                            <p id="submitBtn">応募を再開する</p>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

    </section>

    <!-- 団体アイコン＋紹介エリア -->
    <section>
        <a href="hostpage_ViewOnly.php?id=<?= $eventdata['OWNER_ID'] ?>" id="selfInfo_TopArea">

            <!-- 写真 -->
            <div id="selfIcon_pic">

                <img src="<?= $hostdata['ICON'] ?>">
            </div>

            <!-- 団体情報 -->
            <div id="selfInfo_Box">

                <!-- 団体名　-->
                <h1><?= $hostdata['OWNER_NAME'] ?></h1>

                <!-- 団体紹介文　-->
                <p id="selfInfo_title">団体紹介文</p>
                <div class="word-break">
                    <div class="normal">
                        <p><?= $hostdata['NOTE'] ?></p>
                    </div>
                </div>
                <span id="toHostPage">イベントのホストページへ</span>
            </div>


        </a>
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>

</body>

</html>