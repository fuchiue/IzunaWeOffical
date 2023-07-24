<?php 
require_once "./data.php";
session_start();

$id = $_GET["eventId"]; //前ページで選択された項目のidを取得する

try {
    $sql = 'UPDATE EVENT SET STATUS="募集中" WHERE EVENT_ID=:eventId';
    $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
    $stmt->bindValue(':eventId', $id, PDO::PARAM_INT);
    $stmt->execute(); //実行
    $result = $stmt->fetch(); //データを取得
    header("Location: event_Content.php?eventId=". $id);
} catch (Exception $e) {
    exit($e->getMessage());
}


?>