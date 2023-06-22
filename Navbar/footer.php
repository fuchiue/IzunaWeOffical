<?php
$id=null;
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
?>
<footer>
<<<<<<< HEAD
        <div id="footerSub">
            <a href="index.php">このサイトについて</a>
            <a href="login_page_User.php">ログイン/新規登録</a>
            <a href="#">よくある質問</a>
        </div>
=======
    <div id="footerSub">
        <a href="#">このサイトについて</a>
        <?php
>>>>>>> Lim

        if ($id == null) {
            ?>
            <a href="login_page_User.php">ログイン/新規登録</a>
            <?php
        } else {
            ?>
            <a href="logout.php">ログアウト</a>
            <?php
        }
        ?>
    </div>

    <p>CopyRight by IzanaWeOffical</p>

</footer>