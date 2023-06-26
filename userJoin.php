<?php
session_start();
require_once "./data.php";
//セッションからIDを取得
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
//IDに値が入っているか確認
if (!isset($id)) {
    //ログインされてないためログインページに
    header("Location: login_page_User.php");
}
$eventId = $_GET["eventId"];
$question = Getevent($eventId);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/userJoin.css">

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
        <h1>『　イベント応募　』</h1>
        <h2>Join Our Event</h2>
    </section>

    <!-- 入力情報 -->
    <section id="enter_InfoArea">

        <form action="./userJoin_process.php" method="POST" class="">
            <div id="enter_BigInfoBox">
                <?php if(isset($_GET["ermsg"])){
                        echo "応募の登録に失敗しました。時間をおいてやり直してください";
                    }else{
                        echo "<p>応募先に登録のお名前とメールアドレスが提示されます。よろしいですか</p>";
                    }
                    ?>
                
                <div class="enter_InfoBox">
                    <label class="required">質問：</label>
                    <p><?= $question['QUESTION'] ?></p>
                    <textarea maxlength="300" name="ans"></textarea>
                </div>
                
            </div>
            <div id="enter_InfoSubmit" >
                <button type="submit" name="eventID" value="<?= $eventId ?>">送信</button>
            </div>
        </form>
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>