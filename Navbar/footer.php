<?php
$id=null;
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
?>
<footer>
    <div id="footerSub">
        <a href="#">このサイトについて</a>
        <?php

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