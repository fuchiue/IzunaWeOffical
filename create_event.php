<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/create_event.css">
    
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア -->
    <div id="UJ_header">
        <img src="./image/navbar1.jpg">
    </div>

    <!-- ページ名 -->
    <section id="UJ_Title">
            <h1>『　イベント制作　』</h1>
            <h2>Create New Event</h2>
    </section>

    <!-- 入力情報 -->
    <section id="enter_InfoArea">

        <form action="#" method="POST" class="">
            <div id="enter_BigInfoBox">
                <div class="enter_InfoBox">
                    <label class="required">イベント名：</label>
                    <input type="text" required>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">日時：</label>
                    <input type="text" required>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">会場：</label>
                    <div class="enterAddress">
                        <div class="enterAddress_Box">
                        <p>都道府県　</p>
                        <input type="text" style="width:100px" required>
                        </div> 
                        <div class="enterAddress_Box">
                        <p>　市/区　</p>
                        <input type="text" style="width:100px" required>
                        </div>  
                    </div>
                    <p>丁目/番号</p><input type="text" required>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">活動内容：</label>
                    <input type="text" required>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">イベントテーマ：</label>
                    <select name="eventTypes" id="eventTypes">
                            <option value="#">テーマ</option>
                            <option value="#">教育</option>
                            <option value="#">国際</option>
                            <option value="#">介護</option>
                            <option value="#">災害</option>
                            <option value="#">お祭り</option>
                    </select>
                </div>
                <div class="enter_InfoBox">
                    <label class="required">平均活動時間：</label>
                    <input type="text" placeholder="（１０分単位）" required>
                </div>
                <div class="enter_InfoBox">
                    <label>過去活動の紹介：</label>
                    <input type="text">
                </div>

                <!-- 写真 -->
                <div id="upload_PhotoBox">
                    <input type="file" id="file">
                    <label for="file">写真＋</label>
                </div>
            </div>
            <div id="enter_InfoSubmit">
                <button type="submit">送信</button>
            </div>
        </form>
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>