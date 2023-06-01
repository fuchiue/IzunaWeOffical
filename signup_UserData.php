<?php
$file = 

$result = [
    "status" => true, //エラーがあった場合false
    "message" => null, //表示するメッセージ
    "result" => null, //更新結果(件数)
];

try {
    $dsn = "mysql:host=localhost;dbname=izanadb;charset=utf8mb4";
    $db = new PDO($dsn, "root", "root");
    $db->setAttribute(PDO::ERRMODE_SILENT, false);

    $sql = "INSERT INTO user( 
        USER_NAME,
        NICKNAME,
        NOTE,
        BIRTHDAY,
        ADDRESS,
        GENDER,
        ICON,
        TEL,
        EMAIL
    ) VALUES ( 
        :USER_NAME,
        :NICKNAME,
        :NOTE,
        :BIRTHDAY,
        :ADDRESS,
        :GENDER,
        :ICON,
        :TEL,
        :EMAIL
    )";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":USER_NAME", $user_name, PDO::PARAM_STR);
    $stmt->bindParam(":NICKNAME", $nickname, PDO::PARAM_STR);
    $stmt->bindParam(":NOTE", $note, PDO::PARAM_STR);
    $stmt->bindParam(":BIRTHDAY", $birthday, PDO::PARAM_INT);
    $stmt->bindParam(":ADDRESS", $address, PDO::PARAM_STR);
    $stmt->bindParam(":GENDER", $gender, PDO::PARAM_INT);
    $stmt->bindParam(":ICON", $icon, PDO::PARAM_STR);
    $stmt->bindParam(":TEL", $tel, PDO::PARAM_INT);
    $stmt->bindParam(":EMAIL", $email, PDO::PARAM_STR);

    $stmt->execute();
} catch (PDOException $poe) {
    exit("DBエラー" . $poe->getMessage());
}


header("./userpage_AfterLogin.php");
