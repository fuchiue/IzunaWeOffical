<?php 
require_once "./data.php";

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!--検索エリア-->
    <section id="Opening">

        <div id="home">
        <img src="./image/Home_opening.jpg">
        <img src="./image/Home_opening2.jpg">
        <img src="./image/opening3.jpg">
        </div>
    
        <div id="search" class="search">

            <form action="searchResult.php" method="GET" class="search-bar" target="_self" enctype="">

                <input type="text" placeholder="キーワードで検索" name="searchKeyWord">
    
                <div class="select">
                    <select name="pickArea" id="pickArea">
                        <option value="1" selected>エリア</option>
                        <option value="北海道">北海道</option>
                        <option value="東北">東北</option>
                        <option value="関東">関東</option>
                        <option value="中部">中部</option>
                        <option value="関西">関西</option>
                        <option value="四国">四国</option>
                        <option value="九州">九州</option>
                    </select>
                </div>

                <div class="select">
                    <select name="eventTypes" id="eventTypes">
                        <option value="1" selected>テーマ</option>
                        <option value="教育">教育</option>
                        <option value="国際">国際</option>
                        <option value="福祉">福祉</option>
                        <option value="災害">災害</option>
                        <option value="お祭り">お祭り</option>
                    </select>
                </div>
    
                <button type="submit" value="send"><img src="./image/search.png"></button>
            </form>    
        </div>
    </section>

    <!--最近の活動-->

    <section class="slider_container">

        <!-- <h1>最近のイベント</h1> -->
        <div id="deco_ft">
            <img src="./image/HT_Fox_FrontPage1.png">
        </div>    

        <div class="container">
            <div class="swiper card_slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img_box">
                            <a href="event_Content.php">
                                <img src="./image/works1.jpg">
                                <div class="HP_eventDetails">
                                    <h2>イベント名</h2>
                                    <p>日時</p>
                                    <p>場所</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="img_box">
                            <a href="event_Content.php">
                                <img src="./image/works2.jpg">
                                <div class="HP_eventDetails">
                                    <h2>イベント名</h2>
                                    <p>日時</p>
                                    <p>場所</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="img_box">
                            <a href="event_Content.php"> 
                                <img src="./image/works3.jpg">
                                <div class="HP_eventDetails">
                                    <h2>イベント名</h2>
                                    <p>日時</p>
                                    <p>場所</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="img_box">
                            <a href="event_Content.php">
                                <img src="./image/works1.jpg">
                                <div class="HP_eventDetails">
                                    <h2>イベント名</h2>
                                    <p>日時</p>
                                    <p>場所</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="img_box">
                            <a href="event_Content.php">
                                <img src="./image/works2.jpg">
                                <div class="HP_eventDetails">
                                    <h2>イベント名</h2>
                                    <p>日時</p>
                                    <p>場所</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!--メリット一覧-->

    <section id="meritArea">
        
        <div id="redDecoBox"></div>

        <div id="meritBigBox">
            <h1>ボランティアのメリット</h1>
            <div id="meritSmallBox">
                <div id="meritBox1">
                    <p>　　　社会貢献　　　</p>
                    <p>　　　友達作り　　　</p>
                    <p>　　　達成感ある　　　</p>
                </div>

                <div id="meritBox2">
                    <p>　　　....　　　</p>
                    <p>　　　....　　　</p>
                    <p>　　　....　　　</p>
                </div>
            </div>
        </div>

    </section>

    <div id="deco_hm">
        <img src="./image/HT_Fox FrontPage2.png">
    </div>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>
