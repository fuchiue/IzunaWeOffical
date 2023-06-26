<?php
require_once "./data.php";
session_start();

$ans = htmlentities($_POST['ans'], ENT_QUOTES, 'UTF-8');

//セッションからIDを取得
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
$eventId = $_POST['eventID'];
echo $eventId;

$result = addJoin($id,$eventId);
echo $result;

$ansresult = addans($id,$eventId,$ans);


if($result==1 && $ansresult==1){
    header("Location: event_Content.php?eventId=".$eventId);
}else{
    header("Location: userJoin.php?ermsg=1");
}

