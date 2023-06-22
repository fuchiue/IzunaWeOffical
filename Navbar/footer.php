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
            echo '<a href="login_page_User.php">ログイン/新規登録</a>';
        } else {
            echo '<a href="logout.php">ログアウト</a>';
        }
        ?>
    </div>

    <p>CopyRight by IzanaWeOffical</p>

</footer>