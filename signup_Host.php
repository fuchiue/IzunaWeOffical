<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/signup_Host.css">
    
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

        <!-- Header画像エリア ＋ ページ名 -->
    <div id="SP_header">
        <img src="./image/navbar1.jpg">
        <div id="SP_tilte">
            <h1>ホストサインアップ</h1>
            <p>New Host Sign Up</p>
        </div>
    </div>

    <!-- 入力情報エリア -->
    <section id="signUp_Area">

        <form action="#" method="post" class="">

            <!-- 入力情報(上部) -->
            <div id="signUp_TopArea">
                <!-- 写真 -->
                <div id="returnDrag">
                        <div class="drag-area">
                            <button id="selectPicBtn">ファイルを選択</button>
                            <input type="file" hidden>
                        </div>
                    <button id="newSelectBtn">ファイルを選択</button>
                    <input type="file" hidden>
                </div>

                <!-- 分割線 -->
                <div id="redDecoBox"></div>

                <!-- 個人情報 -->
                <div id="signUp_TopSmallArea">
                    <!-- 一行目の情報 -->
                    <div id="signUp_TopBox">
                        <label class="required">団体名：</label>
                        <div><input type="text" required></div>

                        <label class="required">電話番号：</label>
                        <div><input type="text" required></div>

                    </div>
                    <!-- 一行目の情報終わり -->

                    <!-- 二行目の情報 -->
                    <div id="mail_pass">
                        <!-- 左側 -->
                        
                            <div id="mailArea">
                                <label class="required">メールアドレス：</label>
                                <div><input type="text" required></div>
                            </div>
                        
                        <!-- 左側終わり -->

                        <!-- 右側 -->
                        
                            <div id="pwArea">
                                <label class="required">パスワード：</label>
                                <div><input type="password" required></div>
                            </div>
                        
                        <!-- 右側終わり -->
                    </div>
                    <!-- 二行目の情報終わり -->

                    <!-- 三行目の情報 -->
                    <div id="signUp_place">
                        <label class="required">ご住所：</label>
                        <div id="placeBox1">
                        都道府県：<input type="text" style="width:100px" required>
                        　市/区：<input type="text" style="width:100px" required>
                        </div>
                        <div id="placeBox2">丁目/番号：<input type="text" style="width:370px" required></div>
                    </div>
                    <!-- 三行目の情報終わり -->
                </div>
            </div>

            <!-- 入力情報(下部) -->
            <div id="signUp_BottomArea">

                <label class="required">団体紹介文：</label>
                <div>
                    <textarea placeholder="団体紹介文を入力してください"></textarea>
                </div>

                <label class="required" class="signUp_BSmallBox">イベント募集のカテゴリー：</label>
                    <div id="signUp_BSmallBox2">
                        <div class="select">
                        <select name="theme" id="eventTypes">
                                <option value="教育">教育</option>
                                <option value="国際">国際</option>
                                <option value="介護">介護</option>
                                <option value="災害">災害</option>
                                <option value="お祭り">お祭り</option>
                                <option value="その他">その他</option>
                            </select>
                        </div> 
                    </div>
            </div>

            <div id="signUp_BtnArea">
                <button type="submit">送信</button>
            </div>

        </form>

    </section>

    <?php include('./Navbar/footer.php'); ?>
 
    <script SPc="./js/navbar.js"></script>
    <script SPc="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script SPc="./js/index.js"></script>
    <script src="./js/postpic.js"></script>

</body>

</html>