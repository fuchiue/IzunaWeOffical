<?php
    $id=null;
    if (isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
    }
?>

<header>
        <a href="./index.php" class="logo">HANDS CONNECT</a>

    <ul>
        <li><a href="./index.php">HOME</a></li>
        <?php
            if ($id != null) {
                echo '<li><a href="./login_page_User.php">PROFILE</a></li>';
                echo '<li><a href="logout.php">LOGOUT</a></li>';
            } else{
                echo '<li><a href="./login_page_User.php">LOGIN</a></li>';
                echo '<li><a href="aboutThisSite.php">ABOUT US</a></li>';
            }
        ?>
    </ul>
</header>