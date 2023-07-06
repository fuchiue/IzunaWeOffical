<?php 
require_once "./data.php";
session_start();

try{
    $sql = "SELECT * FROM EVENT WHERE STATUS ='募集中'";
    $stmt = dbc()->prepare($sql);

    $stmt->execute();

    $result = []; 
    // fetch:1列
    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $rows;
    }
    // $indexes = array_rand($result,6);
}catch (Exception $e) {
    exit($e->getMessage());
}
$stmt= null; //破棄の意味 return the intergers back to zero
$db = null;
// echo "<pre>";
// print_r($result);
// echo "</pre>";

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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4d6369389a.js" crossorigin="anonymous"></script>
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!--検索エリア-->
    <section id="Opening">

        <div id="welcomingTitle">
            <p>ボランティアは、良い社会を動かす力だ！</p>
        </div>

        <div id="home">
        <img src="./image/Home_opening.jpg">
        <img src="./image/Home_opening2.jpg">
        <img src="./image/opening3.jpg">
        </div>
    
        <div id="search" class="search">

            <form action="searchResult.php" method="GET" class="search-bar" target="_self" enctype="">

                <input type="text" placeholder="キーワードで検索" name="searchKeyWord" autocomplete="off">
    
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

        <img src="./image/HeartrusFoxFront.gif" id="HeartrusFoxFront">
        
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
                <?php foreach($result as $index):?> 
                    <div class="swiper-slide">
                        <div class="img_box">
                            <a href="event_Content.php?eventId=<?= $index["EVENT_ID"];?>">
                                <img src="<?= $index["ICON"] ;?>">
                                <div class="HP_eventDetails">
                                    <h2><?= $index["EVENT_NAME"] ;?></h2>
                                    <p><i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i>　<?= $index["SCHEDULE"] ;?></p>
                                    <p><i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>　<?= $index["ADDRESS"] ;?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!--メリット一覧-->

    <section class="meritArea">

        <div class="meritInner">
            <div id="meritTitleBox" data-aos="fade-left">
                <p id="meritTitle">ボランティアのメリット</p>
            </div>  
            <div data-aos="fade-up" data-aos-duration="1000"><img src="./image/merit1.png" id="merit1"></div>
            <div data-aos="fade-down" data-aos-duration="2000"><img src="./image/merit2.png" id="merit2"></div>
            <div data-aos="fade-right" data-aos-duration="3000"><img src="./image/merit3.png" id="merit3"></div>
            <div data-aos="fade-left" data-aos-duration="2000"><img src="./image/merit4.png" id="merit4"></div>
    </section>

    <div id="deco_hm">
        <img src="./image/HT_Fox FrontPage2.png">
    </div>

    <?php include('./Navbar/footer.php'); ?>


    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="./js/index.js"></script>

</body>

</html>



        <!-- <div id="redDecoBox"></div>

        <div id="meritBigBox">
            <h1>ボランティアのメリット</h1>
            <div id="meritSmallBox">
                <div id="meritBox1">
                    <p>社会貢献</p>
                    <p>友達作り</p>
                    <p>達成感ある</p>
                </div>

                <div id="meritBox2">
                    <p>　　　生活に楽しみが生まれる　　　</p>
                    <p>　　　社交スキルが高まる　　　</p>
                    <p>　　　就活に有利だ　　　</p>
                </div>
            </div>
        </div> -->


        <!-- 
        <div class="meritbox">
            <div class="meritcontent">
                <h3>社会貢献</h3>
            </div>
        </div>

        <div class="meritbox">
            <div class="meritcontent">
                <h3>友達作り</h3>
            </div>    
        </div>

        <div class="meritbox">
            <div class="meritcontent">
                <h3>達成感<br>ある</h3>
            </div>
        </div>

        <div class="meritbox">
            <div class="meritcontent">
                <h3>社交スキル<br>が高まる</h3>
            </div>    
        </div> -->