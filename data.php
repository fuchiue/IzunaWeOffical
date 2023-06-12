<?php
//require_once "./data.php";
//上記コードをファイルの最初に入れればデータベース接続できる
function dbc()
{
    $host = "localhost";
    $dbname = "izanadb";
    $user = "root";
    $pass = "root";
    $dns = "mysql:host=$host;dbname=$dbname;charset=utf8";
    try {
        $pdo = new PDO(
            $dns,
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
dbc();

//ユーザのデータの取得
function TakeUserData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT POINT,NICKNAME,NOTE FROM USER WHERE USER_ID=:userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $userdata = $stmt->fetch();
    return $userdata;
}

//投稿写真の取得
function TakePostData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT PHOTO,OWNER_ID FROM POST WHERE USER_ID=:userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $postdata = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $postdata;
}
function TakeEventData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT EVENT_ID,ICON,EVENT_NAME,ADDRESS,THEME FROM EVENT WHERE EVENT_ID IN (SELECT EVENT_ID FROM JOINED WHERE USER_ID=:userid AND STATUS='参加済み')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $eventdata = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $eventdata;
}
/**

 * 作成したイベント内容を保存

 */

function eventSave($event_name, $theme, $note, $area, $addressAll, $icon, $schedule, $hour, $owner_id)
{

    $result = False;
    $sql = "INSERT INTO EVENT(EVENT_NAME, THEME, NOTE, AREA, ADDRESS, ICON, SCHEDULE, HOUR, OWNER_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    try {

        // プレースホルダーに値をセット

        $stmt = dbc()->prepare($sql);

        $stmt->bindParam(1, $event_name, PDO::PARAM_STR);

        $stmt->bindParam(2, $theme, PDO::PARAM_STR);

        $stmt->bindParam(3, $note, PDO::PARAM_STR);

        $stmt->bindParam(4, $area, PDO::PARAM_STR);

        $stmt->bindParam(5, $addressAll, PDO::PARAM_STR);

        $stmt->bindParam(6, $icon, PDO::PARAM_STR);

        $stmt->bindValue(7, $schedule, PDO::PARAM_STR);

        $stmt->bindParam(8, $hour, PDO::PARAM_INT);

        $stmt->bindParam(9, $owner_id, PDO::PARAM_INT);

        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
        // $pdo->commit();

    } catch (\Exception $e) {

        echo $e->getMessage();

        return $result;

    }

}




/**

 * ファイルデータを取得

 * @return array $eventData

 */

function getAllEvent()
{

    $sql = "SELECT * FROM EVENT";




    $eventData = dbc()->query($sql);




    return $eventData;

}




function h($s)
{

    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");

}




// images/eventicon