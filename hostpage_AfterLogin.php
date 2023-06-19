<?php
session_start();
require_once "./data.php";
$id = $_SESSION["id"]; //IDを取得
$hostdata = hostGetData($id); //ホストの情報を取得
$joinedUser = hostGetjoinUser($id); //ボランティアに参加したユーザを取得
$eventDatas = HostGetevent($id); //ホストの開催したイベントの情報を取得
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
    <link rel="stylesheet" href="./css/hostpage.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア ＋ ページ名 -->
    <div id="hostpage_header">
        <img src="./image/navbar1.jpg">
        <div id="hostpage_tilte">
            <h1>ホストマイページ</h1>
            <p>Group Profile</p>
        </div>
    </div>

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

    <!-- 投稿写真＋参加者一覧エリア　-->

    <section id="selfInfo_MidArea">

        <!-- 3ボタン　-->
        <div class="hostView_Btn">
            <button id="imgBtn">写真</button>
            <button id="attendantBtn">参加者の皆様</button>
            <a href="postPic_Host.php" id="hostpostBtn">投稿</a>
        </div>

        <div id="switchPage">
            <!-- 投稿した写真　-->
            <div id="hostPostImg">

                <div class="scroll-bg">
                    <div class="scroll-div">
                        <div class="scroll-object">
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
                    </div>
                </div>


            </div>
            <!-- 参加者一覧　-->
            <div id="attendantImg">
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <div class="scroll-object">
                            <?php
                            $cont = 0; //表示回数を管理
                            //三回表示ごとにタグを閉じる
                            foreach ($joinedUser as $user) { //参加ユーザの数だけ回る

                                if ($cont == 0) {
                                    echo '<div class="imgRow">'; //初めのタグ
                                    echo "\n";
                                }
                                //写真の表示　対応するユーザのIDを変数で送っている。
                                echo '<a href="./hostpage_ViewOnly.php?id=' . $user['USER_ID'] . '" class="imgBox"><img src="' . $user['ICON'] . '"></a>';
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
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- イベント一覧＋ 応募者一覧　エリア　-->
    <section id="selfInfo_BottomArea">

        <!-- 3ボタン　-->
        <div class="hostView_Btn">
            <button id="eventControl_Btn">イベント一覧</button>
            <button id="joinedPpl_Btn">応募者一覧</button>
            <a href="create_event.php" id="hostpostBtn">イベント制作</a>
        </div>

        <div id="switchPage">

            <!-- イベント一覧　-->
            <div class="eventControl">

                <?php foreach ($eventDatas as $eventData) : ?>
                    <div class="place-content">

                        <a href="event_Content.php?id=<?= $eventData['EVENT_ID'] ?>" class="col-md-12 col-lg-10 mx-auto item-box">
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

            <!-- 応募者一覧　-->
            <div class="joinedPpl_Control">

                <?php foreach ($registers as $register) : ?>
                    <div class="place-content">
                        <div class="event-item">
                            <diV class="col-md-7 center-item">
                                <div class="joinedPpl_Control_Img">
                                    <a href="userpage_ViewOnly.php">
                                        <img src="<?= $register['ICON']; ?>" alt="">
                                    </a>
                                </div>

                                <div class="informationUser">
                                    <h3><?= $register['EVENT_NAME']; ?></h3>
                                    <p><?= $register['USER_NAME']; ?></p>
                                    <p><a href="mailto: <?= $register['EMAIL']; ?>"><?= $register['EMAIL']; ?></a></p>
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
    <script src="./js/hostpage_AfterLogin.js"></script>
</body>

</html>