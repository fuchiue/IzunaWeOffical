<?php

session_start();
//セッションからIDを取得
if(isset($_SESSION["id"])){
$id = $_SESSION["id"];
}
//IDに値が入っているか確認
if(isset($id)){
    //5桁ならユーザページに遷移
    if(strlen((int)$id)==5){
        header("Location: userpage_AfterLogin.php");
    //6桁ならホストページに遷移
    }else if(strlen((int)$id)==6){
        header("Location: hostpage_AfterLogin.php");
    }
}
require_once __DIR__ . "/data.php";
$username = filter_input(INPUT_POST, "user");
$password = filter_input(INPUT_POST, "password");
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}
$result = [];
HostLogin($username, $password);
?>
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

        <img src="./image/HT_Fox_LoginHost.png">
        <!-- <h1>[　ログイン　]</h1>
        <h2>Login</h2> -->

    </section>

    <section id="login_Area">

        <!-- ログイン -->

        <form action="" method="post" class="loginBox">

            <div id="loginMidBox">
                <p style="font-size:0.1em;color:#f00;">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?></p>
                <div class="loginSmallBox">
                    <label>メールアドレス / ユーザ名：</label>
                    <input type="text" name="user" placeholder="example@gmail.com" required>
                </div>
                <div class="loginSmallBox">
                    <label>パスワード：</label>
                    <input type="password" name="password" required>
                </div>

            </div>

            <div id="loginSubmit">
                <button type="submit">ログイン</button>
            </div>

            <a href="login_page_User.php">参加者側のユーザーはこちらへ</a>

        </form>

        <!-- サインアップページへ -->
        <div id="user_SignUp_Btn">
            <a href="signup_Host.php">サインアップ</a>
        </div>

    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>


</body>

</html>

参加者側のユーザーはこちらへ