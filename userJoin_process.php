<?php
require_once "./data.php";
session_start();
//セッションからIDを取得
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
$eventId = $_POST['eventID'];
echo $eventId;

$result = addJoin($id,$eventId);
echo $result;

if($result==1){
    header("Location: event_Content.php?eventId=".$eventId);
}else{
    header("Location: userJoin.php?ermsg=1");
}

