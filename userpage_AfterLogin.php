<?php
session_start();
require_once __DIR__ . "/data.php";
// ログインからIDを取ってくる
$userid = $_SESSION["id"];
// var_dump($userid);

// IDが入ってたら、TakeUserData,TakePostData,TakeEventDataファンクションを実行してデータを取得する
if (isset($userid)) {
    $userdata = TakeUserData($userid);
    $postdata = TakePostEvent($userid);
    $eventdata = TakeEventData($userid);
} else {
    // header('Location:/login_page_User.php');
    echo "no";
}
// echo "<pre>";
// print_r($postdata);
// echo "</pre>";

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
            <img src="<?= $userdata['ICON'] ?>">
        </div>

        <!-- 分割線 -->
        <div id="redDecoBox"></div>

        <!-- 個人情報 -->
        <div id="selfInfo_Box">
            <!-- ポイント表示 -->
            <div id="pointArea">
                <img src="./image/Point.PNG" id="pointIcon">
                <p>：
                    <?= $userdata['POINT'] ?>点
                </p>
            </div>
            <!-- ニックネーム　-->
            <h1>
                <?= $userdata['NICKNAME'] ?>
            </h1>

            <!-- 自己紹介文　-->
            <p>自己紹介文</p>
            <div class="word-break">
                <div class="normal">
                    <p>
                        <?= $userdata['NOTE'] ?>
                    </p>
                </div>
            </div>
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
                        <!-- <a href="hostpage_ViewOnly.php?id=< ?= $postdatas['OWNER_ID'] ?>" class="imgBox"><img src="< ?= $postdatas['PHOTO'] ?>"></a> -->
                        <a href="#" class="imgBox"><img src="<?= $postdatas['PHOTO'] ?>"></a>
                        <?php $count++; ?>
                        <?php if ($count % 3 === 0): ?>
                        </div>
                        <?php if ($count !== count($postdata)): ?>
                            <div class="imgRow">
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- ポップアップエリア -->
                        <div class="full-screen hidden flex-container-center">

                            <div class="hidden-content">
                                <div class="hidden-content-left">
                                    <img src="<?= $postdatas['PHOTO'] ?>">
                                    <button class="closePopup">戻る</button>
                                </div>

                                <div class="hidden-content-right">
                                    <h3>イベント名：　
                                        <?= $postdatas['EVENT_NAME'] ?>
                                    </h3>
                                    <p>日時：　
                                        <?= $postdatas['SCHEDULE'] ?>
                                    </p>
                                    <p>場所：　
                                        <?= $postdatas['ADDRESS'] ?>
                                    </p>
                                    <p>活動内容：　
                                        <?= $postdatas['NOTE'] ?>
                                    </p>
                                    <div class="word-break">
                                        <div class="normal">
                                            <p>感想：　
                                                <?= $postdatas['COMMENT'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="hostpage_ViewOnly.php?id=<?= $postdatas['OWNER_ID'] ?>">イベントのホストページへ</a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- イベント履歴　-->
            <div class="eventHistory">
                <?php $count = 0; ?>
                <?php foreach ($eventdata as $eventdatas): ?>
                    <div class="place-content">
                        <a href="event_Content.php?eventId=<?= $eventdatas['EVENT_ID'] ?>"
                            class="col-md-12 col-lg-10 mx-auto item-box">
                            <div class="event-item">
                                <diV class="col-md-7 center-item">

                                    <div class="eventControl_Img">
                                        <img src="<?= $eventdatas['ICON'] ?>" alt="">
                                    </div>

                                    <div class="information">
                                        <?php
                                        $checkjoin = checkjoined($userid, $eventdatas["EVENT_ID"]);
                                        if ($checkjoin["STATUS"] == "未参加") {
                                            ?>
                                            <span style="color:blue;">未参加</span>
                                            <?php
                                        } else {
                                            ?>
                                            <div style="color:red;">参加済み</div>
                                            <?php
                                        }
                                        ?>
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