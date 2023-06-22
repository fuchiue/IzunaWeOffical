<?php
require_once "./data.php";
if( $_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: postPic.php");
    exit();
}

session_start();
$id = $_SESSION["id"];

// ファイル関連の取得
$submit = filter_input(INPUT_POST, "submit");

// アップロードされたファイルの一時的な保存場所からファイルを取得し、保存先のディレクトリに移動させる
$photo_tmp = $_FILES["photo"]["tmp_name"];
$photo_name = date('YmdHis') . "_" . $_FILES["photo"]["name"];
$photo_path = "./images/photo/" . $photo_name;

move_uploaded_file($photo_tmp, $photo_path);
// 作成したイベント内容を保存
$photosave = photoSave($id, $photo_path, $owner_id); //投稿した画像を保存

if ($photosave) {
    // 保存成功時の処理
    header("Location: userpage_AfterLogin.php");
    exit();
} else {
    // 保存失敗時の処理
    echo "画像の保存に失敗しました。";
    header("Location: postPic.php");
    exit();
}

?>