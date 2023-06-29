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
            <h2>『 ポイントを貯まる 』!!! EXAMPLE CONTENT!!!</h2>
            <p> 
                1. お店で貯める<br>
                Tポイント提携店でTカードを提示すると、Tポイントが貯まります。店頭にあるTポイントマークが目印です。
                Tポイント提携先はこちらからご確認ください。<br>

                2.インターネットのお店で貯める<br>
                Tポイントはインターネットショッピングサイトやさまざまなインターネットサービスでも貯まります。
                インターネットの提携先、Tポイントの貯め方はこちらからご確認ください<br>

                また、Tポイントの提携先以外でもTモールを経由するとTポイントが貯まります。<br>
                Tモール経由でお買い物できるサイトはこちらからご確認ください。<br>

                3. ポイントを申請して貯める<br>
                商品を購入すると、Tポイントが貯まります。Ｔポイントマークのシールがついている商品が対象です。
                Tポイントが貯まる商品の一覧、申請ページはこちらからご確認ください。<br>

                4. 他社のポイントをＴポイントに交換する<br>
                他の企業で貯めたポイントをＴポイントに交換することができます。
                →ポイント交換ができる提携先はこちらからご確認ください。<br>

                5. カード決済で貯める<br>
                クレジットやプリペイドカードなど、決済機能がついたTカードでお買い物をすると、決済金額に対してさらにポイントが貯まります。
                決済機能付きTカードはこちらからご確認ください。<br>

                また、上記以外にも、ゲームやキャンペーンなどでもお得にTポイントが貯められます。
                詳細は、Tサイト［Tポイント/Tカード］トップページの「Tポイントを貯める」より、ご確認ください。
            </p>
        </div>
        
    </section>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>


</body>

</html>