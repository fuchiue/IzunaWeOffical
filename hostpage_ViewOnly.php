<?php
require_once "./data.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    header("Location: index.php");
}
$hostdata = hostGetData($id); //ホストの情報を取得
$joinedUser = hostGetjoinUser($id); //ボランティアに参加したユーザを取得
$eventDatas = HostGetevent($id); //ホストの開催したイベントの情報を取得
$photodatas = TakePostData($id); //投稿した写真を取得
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/hostpage.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア ＋ ページ名 -->
    <div id="hostpage_header">
        <img src="./image/navbar1.jpg">
        <div id="hostpage_tilte">
            <h1>ホストページ</h1>
            <p>Host Information</p>
        </div>
    </div>

    <!-- 団体アイコン＋紹介エリア -->
    <!-- 団体アイコン＋紹介エリア -->
    <section id="selfInfo_TopArea">
        <!-- 写真 -->
        <div id="selfIcon_pic">
            <img src="<?= $hostdata['ICON'] ?>">
        </div>

        <!-- 分割線 -->
        <div id="redDecoBox"></div>

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
        </div>

    </section>

    <!-- 投稿写真＋イベント履歴エリア　-->

    <section id="selfInfo_BottomArea">

        <!-- 3ボタン　-->
        <div class="hostView_Btn">
            <button id="imgBtn">写真</button>
            <button id="attendantBtn">参加者の皆様</button>
            <button id="nowEventBtn">募集中イベント</button>
        </div>

        <div id="switchPage">
            <!-- 投稿した写真　-->
            <div id="hostPostImg">
                <?php
                $cont = 0; //表示回数を管理
                //三回表示ごとにタグを閉じる
                foreach ($photodatas as $photo) { //参加ユーザの数だけ回る
                    if ($cont == 0) {
                        echo '<div class="imgRow">'; //初めのタグ
                        echo "\n";
                    }

                    //写真の表示
                    echo '<a class="imgBox"><img src="' . $photo['PHOTO'] . '"></a>';
                    echo "\n";

                    //三回写真を表示したら終わりのタグそれ以外ならカウントアップ
                    if ($cont == 2) {
                        echo '</div>'; //終わりのタグ
                        echo "\n";
                        $cont = 0;
                    } else {
                        $cont++;
                    }
                }

                //ユーザが一人もいなかったとき
                if (!$photodatas) {
                    echo '<div class="imgRow">'; //始まりのタグ
                    echo "\n";
                    echo '</div>'; //終わりのタグ
                    echo "\n";
                }
                //ループを抜けた後タグを閉じていないときに閉じる
                if ($cont != 0) {
                    echo '</div>'; //終わりのタグ
                    echo "\n";
                }

                ?>
            </div>

            <!-- 参加者一覧　-->
            <div id="attendantImg">
                <?php
                $cont = 0; //表示回数を管理
                //三回表示ごとにタグを閉じる
                foreach ($joinedUser as $user) { //参加ユーザの数だけ回る

                    if ($cont == 0) {
                        echo '<div class="imgRow">'; //初めのタグ
                        echo "\n";
                    }
                    //写真の表示　対応するユーザのIDを変数で送っている。
                    echo '<a href="./userpage_ViewOnly.php?id=' . $user['USER_ID'] . '" class="imgBox"><img src="' . $user['ICON'] . '"></a>';
                    echo "\n";

                    //三回写真を表示したら終わりのタグそれ以外ならカウントアップ
                    if ($cont == 2) {
                        echo '</div>'; //終わりのタグ
                        echo "\n";
                        $cont = 0;
                    } else {
                        $cont++;
                    }
                }

                //ユーザが一人もいなかったとき
                if (!$joinedUser) {
                    echo '<div class="imgRow">'; //始まりのタグ
                    echo "\n";
                    echo '</div>'; //終わりのタグ
                    echo "\n";
                }
                //ループを抜けた後タグを閉じていないときに閉じる
                if ($cont != 0) {
                    echo '</div>'; //終わりのタグ
                    echo "\n";
                }

                ?>
            </div>


            <!-- イベント履歴　-->
            <div class="eventHistory">

                <?php foreach ($eventDatas as $eventData) : ?>
                    <div class="place-content">

                        <a href="event_Content.php?eventId=<?= $eventData['EVENT_ID'] ?>" class="col-md-12 col-lg-10 mx-auto item-box">
                            <div class="event-item">
                                <diV class="col-md-7 center-item">
                                    <div class="eventControl_Img">
                                        <img src="<?= $eventData['ICON'] ?>" alt="">
                                    </div>

                                    <div class="information">
                                        <p id="event01_Status"><?= $eventData['STATUS'] ?></p>
                                        <h3><?= $eventData['EVENT_NAME'] ?></h3>
                                        <div class="EvCon_Date">
                                            <h4>日時</h4>
                                            <p id="#"><?php echo date("Y年m月d日 H:i", strtotime($eventData['SCHEDULE'])) ?></p>
                                        </div>
                                        <div class="EvCon_Place">
                                            <h4>場所</h4>
                                            <p id="#"><?= $eventData['ADDRESS'] ?></p>
                                        </div>
                                        <div class="EvCon_Theme">
                                            <h4>テーマ</h4>
                                            <p id="#"><?= $eventData['THEME'] ?></p>
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
    <script src="./js/hostpage.js"></script>
</body>

</html>