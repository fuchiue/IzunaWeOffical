<?php
require_once "./data.php";
session_start();
$ansresult =1;

//セッションからIDを取得
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

$eventId = $_POST['eventID'];
echo $id;
echo $eventId;

if (isset($_POST['ans'])) {
    $ans = htmlentities($_POST['ans'], ENT_QUOTES, 'UTF-8');
    echo $ans;
    $ansresult = addans($id, $eventId, $ans);
}
$result = addJoin($id, $eventId);
echo "実行フラグ\n";
echo $result;
echo $ansresult;




if ($result == 1 && $ansresult == 1) {
    header("Location: event_Content.php?eventId=".$eventId);
} else {
    header("Location: userJoin.php?ermsg=1");
}
