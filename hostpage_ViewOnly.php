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
    <section id="selfInfo_TopArea">
        <!-- 写真 -->
        <div id="selfIcon_pic">
            <img src="./image/groupicon.jpg">
        </div>

        <!-- 分割線 -->
        <div id="redDecoBox"></div>

        <!-- 団体情報 -->
        <div id="selfInfo_Box">

            <!-- 団体名　-->
            <h1>団体名</h1>

            <!-- 団体紹介文　-->
            <p id="selfInfo_title">団体紹介文</p>
            <p>OOOOOOOOOOOOOOOOOOOOOOOOOOOOOO</p>
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
                <div class="imgRow">
                <a href="#" class="imgBox"><img src="./image/Event1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/Event1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/Event1.jpeg"></a>
                </div>

                <div class="imgRow">
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                <a href="#" class="imgBox"><img src="./image/ResultArea1.jpeg"></a>
                </div>
            </div>

            <!-- 参加者一覧　-->
            <div id="attendantImg">
                <div class="imgRow">
                <a href="#" class="imgBox"><img src="./image/studenticon.jpg"></a>
                <a href="#" class="imgBox"><img src="./image/studenticon.jpg"></a>
                <a href="#" class="imgBox"><img src="./image/studenticon.jpg"></a>
                </div>

                <div class="imgRow">
                <a href="#" class="imgBox"><img src="./image/studenticon.jpg"></a>
                <a href="#" class="imgBox"><img src="./image/studenticon.jpg"></a>
                <a href="#" class="imgBox"><img src="./image/studenticon.jpg"></a>
                </div>
            </div>
            

            <!-- イベント履歴　-->
            <div class="eventHistory">

                    <div class="place-content">

                        <a href="event_Content.php" class="col-md-12 col-lg-10 mx-auto item-box">
                            <div class="event-item">
                                    <diV class="col-md-7 center-item">
                                        <div class="eventControl_Img">
                                            <img src="./image/ResultArea1.jpeg" alt="" >
                                        </div>

                                        <div class="information">
                                            <p id="event01_Status">募集中</p>
                                            <h3>イベント名</h3>
                                            <div class="EvCon_Date">
                                                <h4>日時</h4>
                                                <p id="#">2023年00月00日　12:00時</p>
                                            </div>
                                            <div class="EvCon_Place">
                                                <h4>場所</h4>
                                                <p id="#">大阪府大阪市北区OOOOOO</p>
                                            </div>
                                            <div class="EvCon_Theme">
                                                <h4>テーマ</h4>
                                                <p id="#">環境</p>
                                            </div>    
                                        </div>
                                    </diV>
                            </div>
                        </a>

                    </div>

                    <div class="place-content">

                        <a href="event_Content.php" class="col-md-12 col-lg-10 mx-auto item-box">
                            <div class="event-item">
                                    <diV class="col-md-7 center-item">
                                        <div class="eventControl_Img">
                                            <img src="./image/Event1.jpeg" alt="">
                                        </div>    

                                        <div class="information">
                                            <p id="event02_Status">募集終了</p>
                                            <h3>イベント名</h3>
                                            <div class="EvCon_Date">
                                                <h4>日時</h4>
                                                <p id="#">2023年00月00日　12:00時</p>
                                            </div>
                                            <div class="EvCon_Place">
                                                <h4>場所</h4>
                                                <p id="#">大阪府大阪市北区OOOOOO</p>
                                            </div>
                                            <div class="EvCon_Theme">
                                                <h4>テーマ</h4>
                                                <p id="#">環境</p>
                                            </div>    
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
    <script src="./js/hostpage.js"></script>
</body>

</html>