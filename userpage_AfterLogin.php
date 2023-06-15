<?php
session_start();
require_once __DIR__ . "/data.php";
// ログインからIDを取ってくる
$userid = $_SESSION["id"];
var_dump($userid);

// IDが入ってたら、TakeUserData,TakePostData,TakeEventDataファンクションを実行してデータを取得する
if ($userid != null) {
    $userdata = TakeUserData($userid);
    $postdata = TakePostData($userid);
    $eventdata = TakeEventData($userid);
} else {
    // header('Location:'.'/login_page_User.php');
}


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/userpage.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア ＋ ページ名 -->
    <div id="userpage_header">
        <img src="./image/navbar1.jpg">
        <div id="userpage_tilte">
            <h1>マイページ</h1>
            <p>My Profile</p>
        </div>
    </div>

    <!-- 個人アイコン＋自己紹介エリア -->
    <section id="selfInfo_TopArea">
        <!-- 写真 -->
        <div id="selfIcon_pic">
            <img src="./image/HT_Fox3 (1).PNG">
        </div>

        <!-- 分割線 -->
        <div id="redDecoBox"></div>

        <!-- 個人情報 -->
        <div id="selfInfo_Box">
            <!-- ポイント表示 -->
            <p>Point Icon Insert：
                <?= $userdata['POINT'] ?>点
            </p>
            <!-- ニックネーム　-->
            <h1>
                <?= $userdata['NICKNAME'] ?>
            </h1>

            <!-- 自己紹介文　-->
            <p>自己紹介文</p>
            <p>
                <?= $userdata['NOTE'] ?>
            </p>
        </div>


    </section>

    <!-- 投稿写真＋イベント履歴エリア　-->

    <section id="selfInfo_BottomArea">

        <!-- 3ボタン　-->
        <div id="userView_Btn">
            <button id="imgBtn">写真</button>
            <button id="historyBtn">イベント履歴</button>
            <a href="postPic.php?user=<?= urlencode($userid) ?>" id="userpostBtn">投稿</a>
        </div>

        <div id="switchPage">
            <!-- 投稿した写真　-->
            <div id="userPostImg">
                <div class="imgRow">
                    <?php $count = 0; ?>
                    <?php foreach ($postdata as $postdatas): ?>
                        <a href="hostpage_ViewOnly.php?id=<?= $postdatas['OWNER_ID'] ?>" class="imgBox"><img src=".<?= $postdatas['PHOTO'] ?>"></a>
                        <?php $count++; ?>
                        <?php if ($count % 3 === 0): ?>
                        </div>
                        <?php if ($count !== count($postdata)): ?>
                            <div class="imgRow">
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- イベント履歴　-->
            <div class="eventHistory">
                <?php $count = 0; ?>
                <?php foreach ($eventdata as $eventdatas): ?>
                    <div class="place-content">

                        <a href="event_Content.php?id=<?= $eventdatas['EVENT_ID'] ?>" class="col-md-12 col-lg-10 mx-auto item-box">
                            <div class="event-item">
                                <diV class="col-md-7 center-item">
                                    <div class="eventControl_Img">
                                        <img src=".<?= $eventdatas['ICON'] ?>" alt="">
                                    </div>

                                    <div class="information">

                                        <h3>
                                            <?= $eventdatas['EVENT_NAME'] ?>
                                        </h3>

                                        <div class="EvCon_Place">
                                            <h4>場所</h4>
                                            <p id="#">
                                                <?= $eventdatas['ADDRESS'] ?>
                                            </p>
                                        </div>

                                        <div class="EvCon_Theme">
                                            <h4>テーマ</h4>
                                            <p id="#">
                                                <?= $eventdatas['THEME'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </diV>
                            </div>
                        </a>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </section>


    <?php include('./Navbar/footer.php'); ?>

    <a></a> <!-- To Top Apple Button-->

    <script src="./js/navbar.js"></script>
    <script src="./js/userpage.js"></script>
</body>

</html>