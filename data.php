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
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, true);
        return $pdo;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
dbc();


/*
ホストプロフィールページに必要なホストのデータを取得
@$id検索するホストのID
*/
function hostGetData($id)
{
    try {
        $sql = 'SELECT OWNER_NAME,NOTE,ICON FROM owner WHERE OWNER_ID=:id'; //団体名、紹介文、アイコン画像を取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
        $stmt->bindValue(':id', $id, PDO::PARAM_STR); //sqlの:idに変数の$idを代入
        $stmt->execute(); //実行
        $result = $stmt->fetch(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

/*
対応するIDのボランティア参加済みのユーザーのIDとアイコンを返す
@$id検索するホストのID
*/
function hostGetjoinUser($id)
{
    try {
        $sql = 'SELECT J.USER_ID,U.ICON,U.POINT FROM
        JOINED AS J
        INNER JOIN
        EVENT AS E
        ON J.EVENT_ID = E.EVENT_ID
        INNER JOIN
        USER AS U
        ON J.USER_ID = U.USER_ID
        WHERE E.OWNER_ID = :id
        AND J.STATUS="参加済み" ORDER BY U.POINT DESC ;'; //ホストのIDのイベントに参加済みの人の情報を取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする 
        $stmt->bindValue(':id', $id, PDO::PARAM_STR); //sqlの:idに変数の$idを代入
        $stmt->execute(); //実行
        $result = $stmt->fetchAll(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

/*
対応するIDの開催したボランティアの情報を返す
@$id検索するホストのID
*/
function HostGetevent($id)
{
    try {
        $sql = 'SELECT * FROM EVENT WHERE OWNER_ID = :id'; //ホストの開催したイベントを取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする 
        $stmt->bindValue(':id', $id, PDO::PARAM_STR); //sqlの:idに変数の$idを代入
        $stmt->execute(); //実行
        $result = $stmt->fetchAll(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

/*
対応するIDのへのボランティア参加リクエスト一覧を返す
@$id検索するホストのID
*/
function GetRegister($id)
{
    try {
        $sql = 'SELECT U.USER_NAME,E.EVENT_NAME,U.ICON,U.EMAIL,U.USER_ID,E.EVENT_ID FROM JOINED AS J
        INNER JOIN USER AS U
        ON J.USER_ID = U.USER_ID
        INNER JOIN EVENT AS E
        ON J.EVENT_ID = E.EVENT_ID
        WHERE OWNER_ID = :id'; //ホストのIDのイベントに参加済みの人の情報を取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする 
        $stmt->bindValue(':id', $id, PDO::PARAM_STR); //sqlの:idに変数の$idを代入
        $stmt->execute(); //実行
        $result = $stmt->fetchAll(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}
/*
ユーザIDとイベントIDから質問の解答を返す
hostpage_AfterLogin
*/
function GetAns($userId,$eventId){
    try {
        $sql = 'SELECT ANSWER FROM answer WHERE USER_ID = :userId AND EVENT_ID = :eventId'; //ホストの開催したイベントを取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする 
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->execute(); //実行
        $result = $stmt->fetch(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}


function searchResult($searchKeyWord, $pickArea, $eventTypes)
{
    try {
        $sql = "SELECT * FROM event WHERE STATUS ='募集中' ";
        $where = "";

        if ($searchKeyWord) {
            $where = " AND EVENT_NAME LIKE :searchKeyWord";
            $searchKeyWord = "%" . $searchKeyWord . "%";
        }

        if ($pickArea && $pickArea != '1') {
            $where .= " AND AREA = :pickArea";
        }


        if ($eventTypes && $eventTypes != '1') {

            $where .= " AND THEME = :eventTypes";
        }

        $stmt = dbc()->prepare($sql . $where);
        // var_dump($sql.$where);
        if ($searchKeyWord) {
            $stmt->bindParam(':searchKeyWord', $searchKeyWord, PDO::PARAM_STR);
        }
        if ($pickArea && $pickArea != '1') {
            $stmt->bindParam(':pickArea', $pickArea, PDO::PARAM_STR);
        }
        if ($eventTypes && $eventTypes != '1') {
            $stmt->bindParam(':eventTypes', $eventTypes, PDO::PARAM_STR);
        }

        $stmt->execute();   // SQL 実行されます

        $result = [];
        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {   // レコードを取ってくる
            $result[] = $rows;
        }
        return $result; //データを返す

    } catch (PDOException $poe) {
        exit("DBエラー" . $poe->getMessage());
    }
}
/*
対応するIDの開催したボランティアの各詳細情報ページを返す
@$id検索するホストのID
*/
function Getevent($id)
{
    try {
        $sql = 'SELECT * FROM EVENT WHERE EVENT_ID = :id'; //ホストの開催したイベントを取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする 
        $stmt->bindValue(':id', $id, PDO::PARAM_STR); //sqlの:idに変数の$idを代入
        $stmt->execute(); //実行
        $result = $stmt->fetch(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}
//ユーザのログイン
function UserLogin($username, $password, $eventid)
{
    if ($username != null && $password != null) {
        try { // トランザクション開始
            $LocationUrl = "Location: userpage_AfterLogin.php";
            
            $pdo = dbc();
            if (strpos($username, '@')) {
                $sql = "SELECT * FROM USER WHERE EMAIL=:username";
            } else {
                $sql = "SELECT * FROM USER WHERE USER_NAME=:username";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && $result["PASSWORD"] === $password) {
                echo $result;
                // ユーザー番号をセッションに登録
                $_SESSION["id"] = $result["USER_ID"];
                if (isset($_GET["eventId"])) {
                    echo $_GET["eventId"];
                    $LocationUrl = "Location: event_Content.php?eventId=" . $_GET["eventId"];
                }
                echo $_SESSION["id"];
                header($LocationUrl);
                //ユーザのマイページに移行する
            } else {
                $msg = "ユーザー名またはパスワードが正しくありません";
                header("Location: login_page_User.php?msg=$msg");
            }
            $pdo->commit();
        } catch (PDOException $poe) {
            $pdo->rollBack();
            echo "DB 接続エラー" . $poe->getMessage();
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }
}

//オーナのログイン
function HostLogin($username, $password)
{
    if ($username != null && $password != null) {
        try { // トランザクション開始
            $pdo = dbc();
            if (strpos($username, '@')) {
                $sql = "SELECT * FROM OWNER WHERE EMAIL=:username";
            } else {
                $sql = "SELECT * FROM OWNER WHERE OWNER_NAME=:username";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && $result["PASSWORD"] === $password) {
                echo $result;
                // ユーザー番号をセッションに登録
                $_SESSION["id"] = $result["OWNER_ID"];
                echo $_SESSION["id"];
                header("Location: hostpage_AfterLogin.php");
                //ユーザのマイページに移行する
            } else {
                $msg = "ユーザー名またはパスワードが正しくありません";
                header("Location: login_page_Host.php?msg=$msg");
            }
            $pdo->commit();
        } catch (PDOException $poe) {
            $pdo->rollBack();
            echo "DB 接続エラー" . $poe->getMessage();
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }
}

//ユーザのデータの取得
function TakeUserData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT POINT,ICON,NICKNAME,NOTE FROM USER WHERE USER_ID=:userid";
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
    $sql = "SELECT EVENT_ID,ICON,EVENT_NAME,OWNER_ID,ADDRESS,THEME,STATUS FROM EVENT WHERE EVENT_ID IN (SELECT EVENT_ID FROM JOINED WHERE USER_ID=:userid )";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $eventdata = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $eventdata;
}

function TakeAllEventData($userid)
{
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT * FROM EVENT WHERE EVENT_ID IN (SELECT EVENT_ID FROM JOINED WHERE USER_ID=:userid AND STATUS='参加済み')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $eventdata = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $eventdata;
}


$directory = "./images/eventicon/";

// ディレクトリが存在しない場合は作成する
if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}

/**
 * 作成したイベント内容を保存
 */
function eventSave($event_name, $theme, $note, $area, $addressAll, $icon, $schedule, $hour, $owner_id, $detail,$questions)
{
    $result = False;

    $pdo = dbc(); // PDO インスタンスを取得

    // トランザクションを開始
    $pdo->beginTransaction();

    $sql = "INSERT INTO EVENT(EVENT_NAME, THEME, NOTE, area, ADDRESS, ICON, SCHEDULE, HOUR, OWNER_ID, DETAIL, QUESTION) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        // プリペアドステートメントを作成
        $stmt = $pdo->prepare($sql);

        $icon_tmp = $_FILES["icon"]["tmp_name"];
        $icon_name = date('YmdHis') . "_" . $_FILES["icon"]["name"];
        $icon_path = "./images/eventicon/" . $icon_name;
        move_uploaded_file($icon_tmp, $icon_path);

        // パラメータをバインド
        $stmt->bindParam(1, $event_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $theme, PDO::PARAM_STR);
        $stmt->bindParam(3, $note, PDO::PARAM_STR);
        $stmt->bindParam(4, $area, PDO::PARAM_STR);
        $stmt->bindParam(5, $addressAll, PDO::PARAM_STR);
        $stmt->bindParam(6, $icon_path, PDO::PARAM_STR);
        $stmt->bindValue(7, $schedule, PDO::PARAM_STR);
        $stmt->bindParam(8, $hour, PDO::PARAM_INT);
        $stmt->bindParam(9, $owner_id, PDO::PARAM_INT);
        if ($detail) {
            $stmt->bindParam(10, $detail, PDO::PARAM_STR);
        } else {
            $detail = null;
            $stmt->bindParam(10, $detail, PDO::PARAM_STR);
        }
        if ($questions) {
            $stmt->bindParam(11, $questions, PDO::PARAM_STR);
        } else {
            $questions = null;
            $stmt->bindParam(11, $questions, PDO::PARAM_STR);
        }
        // クエリを実行
        $stmt->execute();

        // コミット
        $pdo->commit();

        $result = true;
        return $result;
    } catch (\Exception $e) {
        // ロールバック
        $pdo->rollBack();

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

/**
 * ユーザデータを取得
 * @return array $userData
 */
function getAllUser()
{
    $sql = "SELECT * FROM USER ORDER BY POINT DESC LIMIT 10";

    $userData = dbc()->query($sql);

    return $userData;
}


//イベントへの参加応募を登録
function addJoin($userId, $eventId)
{
    try {
        $sql = 'INSERT INTO joined(USER_ID,EVENT_ID)VALUES(?,?)'; //団体名、紹介文、アイコン画像を取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->bindParam(2, $eventId, PDO::PARAM_INT);
        $result = $stmt->execute(); //実行
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

//イベントへの参加応募を登録
function addans($userId,$eventId,$ans){
    try {
        $sql = 'INSERT INTO answer(USER_ID,EVENT_ID,ANSWER)VALUES(?,?,?)'; //団体名、紹介文、アイコン画像を取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->bindParam(2, $eventId, PDO::PARAM_INT);
        $stmt->bindParam(3, $ans, PDO::PARAM_STR);
        $result = $stmt->execute(); //実行
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

function checkjoin($userId, $eventId)
{
    try {
        $sql = 'SELECT COUNT(*) FROM joined WHERE EVENT_ID=:eventId AND USER_ID=:userId'; //団体名、紹介文、アイコン画像を取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
        $stmt->bindValue(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute(); //実行
        $result = $stmt->fetch(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

/**
 * 投稿した画像を保存
 */
$photo_directory = "./images/photo/";

// ディレクトリが存在しない場合は作成する
if (!is_dir($photo_directory)) {
    mkdir($photo_directory, 0755, true);
}

function photoSave($id, $photo_path, $owner_id, $event_id, $comment)
{
    $result = False;

    $pdo = dbc(); // PDO インスタンスを取得

    // トランザクションを開始
    $pdo->beginTransaction();

    $sql = "INSERT INTO POST(USER_ID, PHOTO, OWNER_ID, EVENT_ID, COMMENT) VALUES(?, ?, ?, ?, ?)";

    try {
        // プリペアドステートメントを作成
        $stmt = $pdo->prepare($sql);

        $photo_tmp = $_FILES["photo"]["tmp_name"];
        $photo_name = date('YmdHis') . "_" . $_FILES["photo"]["name"];
        $photo_path = "./images/photo/" . $photo_name;
        move_uploaded_file($photo_tmp, $photo_path);

        // パラメータをバインド
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $photo_path, PDO::PARAM_STR);
        if (strlen($id) !== 6) {
            $stmt->bindParam(3, $owner_id, PDO::PARAM_INT);
        } else {
            $owner_id = null;
            $stmt->bindParam(3, $owner_id, PDO::PARAM_INT);
        }
        $stmt->bindParam(4, $event_id, PDO::PARAM_INT);
        $stmt->bindParam(5, $comment, PDO::PARAM_STR);
        // クエリを実行
        $stmt->execute();

        // コミット
        $pdo->commit();

        $result = true;
        return $result;
    } catch (\Exception $e) {
        // ロールバック
        $pdo->rollBack();

        echo $e->getMessage();
        return $result;
    }
}


function TakePostEvent($userid){
    $id = filter_var($userid, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ユーザー名をエスケープしてフィルタリングする
    $pdo = dbc();
    $sql = "SELECT P.PHOTO,P.OWNER_ID,E.EVENT_NAME,E.NOTE,E.SCHEDULE,E.ADDRESS FROM POST AS P 
    INNER JOIN EVENT AS E
    ON P.EVENT_ID = E.EVENT_ID
    WHERE USER_ID=:userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $postdata = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $postdata;
}

//ここから画像投稿でPOINTを加算するために使うSQL

/*
ユーザーIDとイベントIDからすでに投稿しているか調べる。投稿がない場合0を返す
*/
function countPost ($id,$event)
{
    try {
        $sql = 'SELECT COUNT(*) FROM post WHERE USER_ID=:userId AND EVENT_ID=:eventId'; 
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
        $stmt->bindValue(':userId', $id, PDO::PARAM_STR); //sqlの:idに変数の$idを代入
        $stmt->bindValue(':eventId', $event, PDO::PARAM_STR);
        $stmt->execute(); //実行
        $result = $stmt->fetch(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}
//上の結果が0で帰ってきた場合 Getevent メゾットを実行しHOURを取得する。

/*
ユーザーデータのポイントにGeteventで取ってきた活動時間を加算して更新する
*/
function addPoint ($userId,$addPoint)
{
    try {
        $sql = 'UPDATE user SET POINT=POINT+:addPoint WHERE USER_ID=:userId'; 
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT); 
        $stmt->bindValue(':addPoint', $addPoint, PDO::PARAM_INT); 
        $stmt->execute(); //実行
        $result = $stmt->fetch(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

function updateJoin ($userId,$eventId)
{
    try {
        $sql = 'UPDATE joined SET STATUS="参加済み" WHERE USER_ID=:userId AND EVENT_ID=:eventId'; 
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT); 
        $stmt->bindValue(':eventId', $eventId, PDO::PARAM_INT); 
        $stmt->execute(); //実行
        $result = $stmt->fetch(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}

//ここまで画像投稿でPOINTを加算するために使うSQL


// 参加者名簿を取得
function Getguest($eventId)
{
    try {
        $sql = 'SELECT U.USER_NAME,E.EVENT_NAME,U.ICON,U.EMAIL,U.USER_ID,E.EVENT_ID, J.STATUS FROM JOINED AS J
        INNER JOIN USER AS U
        ON J.USER_ID = U.USER_ID
        INNER JOIN EVENT AS E
        ON J.EVENT_ID = E.EVENT_ID
        WHERE J.EVENT_ID = :eventId'; //ホストのIDのイベントに参加済みの人の情報を取得
        $stmt = dbc()->prepare($sql); //SQLにbindValueできるようにする 
        $stmt->bindValue(':eventId', $eventId, PDO::PARAM_STR); //sqlの:idに変数の$idを代入
        $stmt->execute(); //実行
        $result = $stmt->fetchAll(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}
