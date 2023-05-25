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
            <h1>ユーザーページ</h1>
            <p>User Information</p>
        </div>
    </div>

    <!-- 個人アイコン＋自己紹介エリア -->
    <section id="selfInfo_TopArea">
        <!-- 写真 -->
        <div id="selfIcon_pic">
            <img src="./image/studenticon.jpg">
        </div>

        <!-- 分割線 -->
        <div id="redDecoBox"></div>

        <!-- 個人情報 -->
        <div id="selfInfo_Box">
            <!-- ポイント表示 -->
            <p>Point Icon Insert：１００点</p>

            <!-- ニックネーム　-->
            <h1>ニックネーム</h1>

            <!-- 自己紹介文　-->
            <p>自己紹介文</p>
            <p>OOOOOOOOOOOOOOOOOOOOOOOOOOOOOO</p>
        </div>

    </section>

    <!-- 投稿写真＋イベント履歴エリア　-->

    <section id="selfInfo_BottomArea">

        <!-- 2ボタン　-->
        <div id="userView_Btn">
            <button id="imgBtn">写真</button>
            <button id="historyBtn">イベント履歴</button>
        </div>
        
        <div id="switchPage">
            <!-- 投稿した写真　-->
            <div id="userPostImg">
                <div class="imgRow">
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                </div>

                <div class="imgRow">
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                </div>
            </div>

            <!-- イベント履歴　-->
            <div class="eventHistory">

                    <div class="place-content" id="page<?= $i ?>">

                        <a href="event_Content.php" class="col-md-12 col-lg-10 mx-auto item-box">
                            <div class="event-item">
                                    <diV class="col-md-7 center-item">
                                        <img src="./image/ResultArea1.jpeg" alt="">

                                        <div class="information">
                                            <h3>イベント名</h3>
                                            <p>日時</p>
                                            <p>場所</p>
                                            <p>テーマ</p>
                                        </div>
                                    </diV>
                            </div>
                        </a>

                    </div>

                    <div class="place-content" id="page<?= $i ?>">

                        <a href="event_Content.php" class="col-md-12 col-lg-10 mx-auto item-box">
                            <div class="event-item">
                                    <diV class="col-md-7 center-item">
                                        <img src="./image/ResultArea1.jpeg" alt="">

                                        <div class="information">
                                            <h3>イベント名</h3>
                                            <p>日時</p>
                                            <p>場所</p>
                                            <p>テーマ</p>
                                        </div>
                                    </diV>
                            </div>
                        </a>

                    </div>

            </div>
        </div>

    </section>

    
    <?php include('./Navbar/footer.php'); ?>

    <a></a> <!-- To Top Apple Button-->
    
    <script src="./js/navbar.js"></script>
    <script src="./js/userpage.js"></script>
</body>

</html>