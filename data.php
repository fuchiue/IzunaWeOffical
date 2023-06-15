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
        $sql = 'SELECT J.USER_ID,U.ICON FROM
        JOINED AS J
        INNER JOIN
        EVENT AS E
        ON J.EVENT_ID = E.EVENT_ID
        INNER JOIN
        USER AS U
        ON J.USER_ID = U.USER_ID
        WHERE E.OWNER_ID = :id
        AND J.STATUS="参加済み";'; //ホストのIDのイベントに参加済みの人の情報を取得
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
        $sql = 'SELECT U.USER_NAME,E.EVENT_NAME,U.ICON,U.EMAIL FROM REGISTER AS R
        INNER JOIN USER AS U
        ON R.USER_ID = U.USER_ID
        INNER JOIN EVENT AS E
        ON R.EVENT_ID = E.EVENT_ID
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


function searchResult($searchKeyWord,$pickArea,$eventTypes){
    try{
        var_dump($searchKeyWord);
        var_dump($pickArea);
        var_dump($eventTypes);
        $sql = "SELECT * FROM event";
        $where = "";

            if($searchKeyWord){
                $where = " WHERE EVENT_NAME LIKE :searchKeyWord";
                $searchKeyWord = "%".$searchKeyWord."%";
            }

            if($pickArea && $pickArea!= '1'){
                if($where != ""){
                    $where .= " AND AREA = :pickArea";
                }else {
                    $where = " WHERE AREA = :pickArea";
                }
            }

            if($eventTypes && $eventTypes!= '1'){
                if($where != ""){
                    $where .= " AND THEME = :eventTypes";
                }else {
                    $where = " WHERE THEME = :eventTypes";
                }
            }

            $stmt = dbc()->prepare($sql.$where); 
            var_dump($sql.$where);
            if($searchKeyWord){
                $stmt->bindParam(':searchKeyWord',$searchKeyWord, PDO::PARAM_STR);
            }
            if($pickArea && $pickArea!= '1'){
                $stmt->bindParam(':pickArea',$pickArea, PDO::PARAM_STR);
            }
            if($eventTypes && $eventTypes!= '1'){
                $stmt->bindParam(':eventTypes',$eventTypes, PDO::PARAM_STR);
            }
    
            $stmt -> execute();   // SQL 実行されます

            $result = [];
            while($rows = $stmt -> fetch(PDO:: FETCH_ASSOC)){   // レコードを取ってくる
                $result[] = $rows;
            }
            return $result; //データを返す

    }catch(PDOException $poe){
        exit("DBエラー".$poe -> getMessage());
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
        $result = $stmt->fetchAll(); //データを取得
        return $result; //データを返す
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}