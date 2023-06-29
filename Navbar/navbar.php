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
        <li><a href="./login_page_User.php">PROFILE</a></li>
        <?php
            if ($id != null) {
                echo '<li><a href="logout.php">LOGOUT</a></li>';
            } 
        ?>
    </ul>
</header>