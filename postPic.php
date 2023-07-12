<?php
session_start();
require_once "./data.php";
// ログインからIDを取ってくる
$userid = $_SESSION["id"];
$eventdatas = TakeAllEventData($userid);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpor
    t" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/4d6369389a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/postPic.css">
    
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
            <h1>『　写真投稿　』</h1>
            <h2>Post Your Picture</h2>
    </section>

    <!-- 入力情報 -->
    <section id="upload_Area">

        <form action="post_result.php" method="POST" class="" enctype="multipart/form-data">
            <div id="upload_TopArea">
                <!-- 写真 -->
                <div id="returnDrag">
                    <div class="drag-area">
                        <div id="uploadTitle">
                            <div class="icon"><i class="fa-solid fa-cloud-arrow-up" style="color: #DD0000;"></i></div>
                            <p>ここにファイルをドラッグ＆ドロップ</p>
                            <span>または</span>
                        </div>    
                        <button id="selectPicBtn">ファイルを選択</button>
                        <input type="file" id="photo" name="photo" hidden accept="image/*">
                    </div>
                    <button id="newSelectBtn">ファイルを選択</button>
                    <!-- <input type="file" hidden accept="image/*"> -->
                </div>

                <!-- ホスト選択 Scroll box -->
                <div class="rightArea">
                    <h3 id="annotations">この写真に対するイベントを選択してください</h3>
                    <div class="scroll-bg">
                        <div class="scroll-div">
                            <div class="scroll-object">
                            <?php foreach ($eventdatas as $eventdata) : ?>
                                <div class="place-content">

                                    <div class="event-item">
                                        <label>
                                            <input type="radio"  id="event"
                                            name="value" value="<?= $eventdata['OWNER_ID'].",".$eventdata['EVENT_ID'] ?>" hidden onchange="handleEventSelection(event)">
                                            <diV class="col-md-7 center-item">
                                                <div class="eventControl_Img">
                                                    <img src="<?= $eventdata['ICON'] ?>" alt="イベント写真">
                                                </div>    

                                                <div class="information">

                                                    <h3><?= $eventdata['EVENT_NAME'] ?></h3>
                                                    

                                                </div>
                                            </diV>
                                        </label>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 口コミ -->
            <div class="bottomArea">
                <label class="commentTitle">このボランティア活動に参加した感想をシェアしてください</label>
                <textarea maxlength="300" name="comment" cols="30" rows="10" placeholder="感想を入力してください。"></textarea>
            </div>

            <div id="signUp_BtnArea">
                <button type="submit">送信</button>
            </div>

        </form>
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/postpic.js"></script>

</body>

</html>