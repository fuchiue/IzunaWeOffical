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
        <img src="./image/banner2.jpg" id="event_detail_pic"> 
        </div>

    </section>


    <!-- イベント詳細 -->

    <section id="event_BigDetails">

        <div id="event_Box1">
            <div id="event_InfoTitle">
                <p class="EV_Small_Title">イベント名：</p>
                <p class="EV_Small_Title">活動テーマ：</p>
                <p class="EV_Small_Title">日時：</p>
                <p class="EV_Small_Title">集合時間：</p>
                <p class="EV_Small_Title">活動場所：</p>
                <p class="EV_Small_Title">募集対象：</p>
                <p class="EV_Small_Title">募集詳細：</p>
            </div>

            <div id="event_SmallContent">
                <p id="eventName">OOOイベント</p>
                <p id="eventTheme">環境</p>
                <p id="eventTime">2023年O月O日　00:00</p>
                <p id="event_Meet_Time">00:00</p>
                <p id="eventPlace">大阪府大阪市</p>
                <p id="eventPeople">高校生、大学生</p>
                <p id="eventInfo">OOOOOOOOO</p>
            </div>
        </div>    

        <div id="event_Box2">
            <a href="userJoin.php" id="joinEventBtn">
                <p id="submitBtn">応募</p>
            </a>
        </div>    

    </section>

    <div id="joinEventBtn">
    </div>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>

</body>

</html>