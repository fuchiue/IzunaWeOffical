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

        <form action="#" method="POST" class="">
            <div id="enter_BigInfoBox">
                <div class="enter_InfoBox">
                    <label class="required">参加者のお名前：</label>
                    <input type="text" required>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">メールアドレス：</label>
                    <input type="email" required>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">質問：</label>
                    <p>This is a question area OOOOOですか？</p>
                    <input type="text" required>
                </div>
                <div class="enter_InfoBox">
                    <label class="noteArea">備考：</label>
                    <input type="text">
                </div>
            </div>
            <div id="enter_InfoSubmit">
                <button type="submit">送信</button>
            </div>
        </form>
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>