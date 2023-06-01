<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/signup_User.css">
    
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

        <!-- Header画像エリア ＋ ページ名 -->
    <div id="SP_header">
        <img src="./image/navbar1.jpg">
        <div id="SP_tilte">
            <h1>サインアップ</h1>
            <p>New User Sign Up</p>
        </div>
    </div>

    <!-- 入力情報エリア -->
    <section id="signUp_Area">

        <form action="#" method="post" class="">

            <!-- 入力情報(上部) -->
            <div id="signUp_TopArea">
                <!-- 写真 -->
                <div class="drag-area">
                    <button>ファイルを選択</button>
                    <input type="file" hidden>
                </div>

                <!-- 分割線 -->
                <div id="redDecoBox"></div>

                <!-- 個人情報 -->
                <div id="signUp_TopSmallArea">
                    <!-- 左側の情報 -->
                    <div id="signUp_TopBox">
                        <div class="singlebox">
                            <label class="required">姓：</label>
                            <div><input type="text" required></div>
                        </div>
                        <div class="singlebox">
                            <label class="required">ニックネーム：</label>
                            <div><input type="text" required></div>
                        </div>
                        <div class="singlebox">
                            <label class="required">電話番号：</label>
                            <div><input type="text" required></div>
                        </div>
                        <div class="singlebox">
                            <label class="required">生年月日：</label>
                            <div><input type="text" placeholder="YYYY/MM/DD" required></div>
                        </div>
                    </div>
                    <!-- 左側の情報終わり -->


                    <!-- 右側の情報 -->
                    <div class="signUp_TSmallBox">
                        <div class="singlebox">
                            <label class="required">名：</label>
                            <div><input type="text" required></div>
                        </div>
                        <div>
                            <label class="required">性別：</label>
                            <div id="genderBox">
                                <input type="radio" name="gender" value="male" required>男　
                                <input type="radio" name="gender" value="female" required>女
                            </div>
                        </div>
                        <div class="singlebox">
                            <label class="required">メールアドレス：</label>
                            <div><input type="text" required></div>
                        </div>
                    </div>
                    <!-- 右側の情報終わり -->
                </div>
            </div>

            <!-- 入力情報(下部) -->
            <div id="signUp_BottomArea">

                <label class="required">ご住所：</label>
                <div id="signUp_place">
                    都道府県：<input type="text" required>
                    　市/区：<input type="text" required>
                    　丁目/番号：<input type="text" required>
                </div>

                <label class="required">自己紹介文：</label>
                <textarea placeholder="自己紹介文を入力してください" required></textarea>

                <label>スキル/資格：</label>
                <input type="text">

                <label>ボランティア歴：</label>
                <input type="text">

                <div id="signUp_BottomBox">
                    <div id="signUp_BSmallBox1">
                        <label>やりたいこと：</label>
                        <input type="text">
                    </div>
                    
                    <div id="signUp_BSmallBox2">
                        <p>参加したいカテゴリ：</p>
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

</body>

</html>