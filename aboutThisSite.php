<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/aboutThisSite.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア -->
    <div id="UL_header">
        <img src="./image/navbar1.jpg">
    </div>

    <!-- サイトの紹介 -->
    <section id="aboutUs">

        <h1>『　このサイトについて　』</h1>
        <h2>About Our Site</h2>

        <img src="./image/AboutUs.jpg">
        <p>『 このWebシステムは登録制でオーナがボランティアを募集し、ユーザーがボランティアに参加するサイト。
            オーナは自分たちの活動写真を掲載して魅力的なページを作って、ユーザに興味を持ってもらう。
            ユーザは興味を持ったボランティアに参加し、その様子を自身のページで共有する。
            また他のユーザの参加履歴を閲覧して他のボランティアに興味を誘い参加してもらいボランティアの輪を広げていく。
            このサイトを利用しボランティアに参加することを通じて社会貢献ポイントを貯め、進学と就職の際に指標として使えば理想の将来像を考える。』</p>

    </section>

    <!-- ポイントを貯まる紹介 -->
    <section id="introPointArea">
        <div id="left">
            <img src="./image/PointFox.png">
        </div>

        <div id="right">
            <h2>『 ポイントを貯める 』</h2>
            
                <h3>1. 参加してみたボランティアを探す</h3>
                <p>まずは自分の興味のあるボランティアを探して見よう！<br>
                いろんな団体やユーザーが開催したボランティアや参加したボランティアについての写真を投稿してくれています。<br>
                きっとあなたも興味を持てるボランティアが見つかります。<br></p>
                <br>
                <h3>2.ボランティアに応募してみる!</h3>
                <p>あなたが興味をもつボランティアを見つけることが出来たら実際に参加してみましょう。<br>
                サイトに登録さえ済めば最短2クリックで簡単に応募する事ができます。<br></p>
                <br>
                <h3>3.実際にボランティアに参加</h3>
                <p>応募が済んだら開催しているボランティア団体からメールが届きます。<br>
                そこで参加決定したらボランティアに実際に参加ということになります。<br></p>
                <br>
                <h3>4.写真をとろう</h3>
                <p>あなたが参加したボランティアの様子をほかのユーザーに知ってもらえるように写真を取って投稿し共有しよう！<br></p>
                <br>
                <h3>5.ポイントをもらう</h3>
                <p>あなたが参加したボランティアの写真を投稿するときに参加したボランティアの活動時間に応じてポイントが付与されます<br>
                ポイントは活動時間1分につき1ポイント付与されます。</p>


                
            </p>
        </div>

    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>


</body>

</html>