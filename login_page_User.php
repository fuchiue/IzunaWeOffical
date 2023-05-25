<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/login_page.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

        <!-- Header画像エリア -->
    <div id="UL_header">
        <img src="./image/navbar1.jpg">
    </div>

    <!-- ログインページ名 -->
    <section id="UL_Title">

        <img src="./image/HT_Fox_LoginUser.png">
        <!-- <h1>[　ログイン　]</h1>
        <h2>Login</h2> -->

    </section>

    <section id="login_Area">

        <!-- ログイン -->

        <form action="#" method="post" class="loginBox">
            
            <div id="loginMidBox">
                <div class="loginSmallBox">
                    <label>メールアドレス：</label>
                    <input type="email" placeholder="example@gmail.com" required>
                </div>
                <div class="loginSmallBox">
                    <label>パスワード：</label>
                    <input type="text" required>
                </div>
                
            </div>

                <div id="loginSubmit">
                    <button type="submit">ログイン</button>
                </div>

                <a href="login_page_Host.php">ホスト側のユーザーはこちらへ</a>
    
        </form>

        <!-- サインアップページへ -->
        <div id="user_SignUp_Btn">
            <a href="signup_User.php">サインアップ</a>
        </div>

</section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>


</body>

</html>