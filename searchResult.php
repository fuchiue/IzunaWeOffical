<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/searchResult.css">
    <title>ボランティア</title>
</head>
<body>
    
    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア ＋ ページ名 -->
    <div id="SR_header">
        <img src="./image/navbar1.jpg">
        <div id="SR_tilte">
            <h1>イベントサーチ</h1>
            <p>Event Search</p>
        </div>
    </div>

    <!-- 検索ボックス -->
    <section id="SR_SearchBar">

        <div id="search" class="search">

            <form action="#" method="GET" class="search-bar" target="_self" enctype="">
                <input type="hidden" id="lat"  name="lat">
                <input type="hidden" id="lng"  name="lng">
                <input type="text" placeholder="キーワードで検索" name="searchR">

                <div class="select">
                    <select name="pickArea" id="pickArea">
                        <option value="#">エリア</option>
                        <option value="#">北海道</option>
                        <option value="#">東北</option>
                        <option value="#">関東</option>
                        <option value="#">中部</option>
                        <option value="#">関西</option>
                        <option value="#">四国</option>
                        <option value="#">九州</option>
                    </select>
                </div>

                <div class="select">
                    <select name="eventTypes" id="eventTypes">
                        <option value="#">テーマ</option>
                        <option value="#">教育</option>
                        <option value="#">国際</option>
                        <option value="#">介護</option>
                        <option value="#">災害</option>
                        <option value="#">お祭り</option>
                    </select>
                </div>

                <button type="submit" value="send"><img src="./image/search.png"></button>
            </form>    
        </div>
    </section>

    <!-- 検索結果の一覧 -->
    <section class="place-content-wrap">

        <div class="place-content" id="page<?= $i ?>">
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
        <div class="place-content" id="page<?= $i ?>">
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
        <div class="place-content" id="page<?= $i ?>">
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
        <div class="place-content" id="page<?= $i ?>">
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
        <div class="place-content" id="page<?= $i ?>">
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
        <div class="place-content" id="page<?= $i ?>">
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
        
</section>
    
    <?php include('./Navbar/footer.php'); ?>

    <!-- To Top Apple Button-->
    <div id="pagetop" >
            <a href="#"><img src="./image/HT_Fox3 (Small Search).PNG"></a>
    </div>
    
    <script src="./js/navbar.js"></script>
</body>

</html>