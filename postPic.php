<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpor
    t" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/4d6369389a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/postPic.css">
    
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
            <h1>『　写真投稿　』</h1>
            <h2>Post Your Picture</h2>
    </section>

    <!-- 入力情報 -->
    <section id="upload_Area">

        <form action="#" method="POST" class="">
            <div id="upload_TopArea">
                <!-- 写真 -->
                <div class="drag-area">
                    <div class="icon"><i class="fa-solid fa-cloud-arrow-up" style="color: #DD0000;"></i></div>
                    <p>Drag and Drop to Upload File</p>
                    <span>または</span>
                    <button>Browse Files</button>
                </div>

                <!-- ホスト選択 -->
                <div id="choose_Host">
                    <buttom>ホスト１</buttom>
                    <div>ホスト２</div>
                    <div>ホスト３</div>
                    <div>ホスト４</div>
                    <div>ホスト５</div>
                </div>
            </div>

            <div id="BtnArea">
                <button type="submit">投稿</button>
            </div>
        </form>
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>