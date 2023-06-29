<?php
require_once "./data.php";
$searchKeyWord = null;
$pickArea = null;
$eventTypes = null;
$status["message"] = null;


if (isset($_GET["searchKeyWord"])){
    $searchKeyWord = $_GET["searchKeyWord"];
}

if (isset($_GET["pickArea"])){
    $pickArea = $_GET["pickArea"];
}

if (isset($_GET["eventTypes"])){
    $eventTypes = $_GET["eventTypes"];
}

$searchResult = searchResult($searchKeyWord, $pickArea, $eventTypes);

if (empty($searchResult)) { 
    $status["message"] ='条件に当てはまる募集は見つかりません。再検索してください。'; 
} 

// echo "<pre>";
// print_r($searchResult);
// echo "</pre>";

$stmt= null; //破棄の意味 return the intergers back to zero
$db = null;

?>

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

        <p id="errorM" style="text-align: center; color: red;"><?= $status["message"];?></p>
        
    </section>

    <!-- 検索結果の一覧 -->
    <section class="place-content-wrap">
        <?php foreach($searchResult as $value):?> 
            <div class="place-content" id="page">
                <a href="event_Content.php?eventId=<?= $value["EVENT_ID"];?>" class="col-md-12 col-lg-10 mx-auto item-box">
                    <div class="event-item">
                            <diV class="col-md-7 center-item">
                                <div class="eventControl_Img">
                                    <img src="<?= $value["ICON"];?>" alt="" >
                                </div>

                                <div class="information">
                                    <p id="event01_Status"><?=$value["STATUS"];?></p>
                                    <h3><?=$value["EVENT_NAME"];?></h3>
                                    <div class="EvCon_Date">
                                        <h4>日時</h4>
                                        <p id="#"><?=$value["SCHEDULE"];?></p>
                                    </div>
                                    <div class="EvCon_Place">
                                        <h4>場所</h4>
                                        <p id="#"><?=$value["ADDRESS"];?></p>
                                    </div>
                                    <div class="EvCon_Theme">
                                        <h4>テーマ</h4>
                                        <p id="#"><?=$value["THEME"];?></p>
                                    </div>    
                                </div>
                            </diV>
                    </div>
                </a>
            </div>
        <?php endforeach ?>

        
</section>
    
    <?php include('./Navbar/footer.php'); ?>

    <!-- To Top Apple Button-->
    <div id="pagetop" >
            <a href="#SR_header"><img src="./image/HT_Fox3 (Small Search).PNG"></a>
    </div>
    
    <script src="./js/navbar.js"></script>
</body>

</html>


 <!-- 
       // try{
    //     //-------------- 学校のやり方-------------//
    //     // $host = "localhost";
    //     // $dbname = "izanadb";
    //     // $user = "root";
    //     // $pass = "root";
    //     // $dsn = "mysql:host=$host; dbname=$dbname; charset=utf8";

    //     // $db = new PDO($dsn,$user,$pass); //PDO("access database's root"," login username","database password")
    //     // $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    //     // $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING ); //新規値so that is false
    //     //-------------- 学校のやり方-------------//

    //     $sql = "SELECT * FROM event";
    //     $where = "";

    //         if($searchKeyWord){
    //             $where = " WHERE EVENT_NAME LIKE :searchKeyWord";
    //             $searchKeyWord = "%".$searchKeyWord."%";
    //         }

    //         if($pickArea && $pickArea!= '1'){
    //             if($searchKeyWord){
    //                 $where .= " AND AREA = :pickArea";
    //             }else {
    //                 $where = " WHERE AREA = :pickArea";
    //             }
    //         }

    //         if($eventTypes && $eventTypes!= '1'){
    //             if($searchKeyWord){
    //                 $where .= " AND THEME = :eventTypes";
    //             }else {
    //                 $where = " WHERE THEME = :eventTypes";
    //             }
    //         }

    //         // $stmt = $db ->prepare($sql.$where); //-------------- 学校のやり方-------------//
    //         $stmt = dbc()->prepare($sql.$where); 

    //         if($searchKeyWord){
    //             $stmt->bindParam(':searchKeyWord',$searchKeyWord, PDO::PARAM_STR);
    //         }

    //         if($pickArea && $pickArea!= '1'){
    //             $stmt->bindParam(':pickArea',$pickArea, PDO::PARAM_STR);
    //         }

    //         if($eventTypes && $eventTypes!= '1'){
    //             $stmt->bindParam(':eventTypes',$eventTypes, PDO::PARAM_STR);
    //         }
            

    //         $stmt -> execute();   // SQL 実行されます

    //         $result = [];
    //         while($rows = $stmt -> fetch(PDO:: FETCH_ASSOC)){   // レコードを取ってくる
    //             $result[] = $rows;
    //         }

    //         if (empty($result)) { 
    //             $status["message"] ='条件に当てはまる募集は見つかりません。再検索してください。'; 
    //         } 
            

    // }catch(PDOException $poe){
    //     exit("DBエラー".$poe -> getMessage());
    // }

 -->