<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/merit_Content.css">
    <title>ボランティア</title>
</head>

<body>

    <?php include('./Navbar/navbar.php'); ?>

    <!-- Header画像エリア -->
    <div id="Merit_header">
        <img src="./image/navbar1.jpg">

        <p>ボランティアのメリット</p>
    </div>

    </section>

    <section id="Merit_Area">

        <!-- メリット一覧 -->
        <div data-aos="fade-up" data-aos-duration="500"id="society">
            <a href="#society"><img src="./image/merit1.png"></a>
            <p>社会課題の原因を学ぶこともできます。なぜ困難な状況になっている人がいるのかを考える、
                あるいは自然環境の問題となる要因に目を向けていく、といったこともあるでしょう。
                社会貢献を通してSDGsなどの社会の持続性・連続性を学ぶことができ、自身の生活とのつながりを考えるきっかけにもなりえます。
            </p>
        </div>

        <div data-aos="fade-up" data-aos-duration="500" id="friends">
            <p>参加するボランティアの団体や目的を選ぶ際は、同じボランティア活動に参加している人たちについても考慮しましょう。
                共通の関心事を持つことで、周囲の参加者とより親しい関係を築くことができるかもしれません。</p>
            <a href="#friends"><img src="./image/merit2.png"></a>
        </div>

        <div data-aos="fade-up" data-aos-duration="500" id="communicate">
            <a href="#communicate"><img src="./image/merit3.png"></a>
            <p>ボランティア活動は初対面の人と話す機会につながるため、社交スキルを磨くのにも適しているでしょう。
                長時間を他者と協力して過ごし、傾聴力や人間関係管理能力などの社交スキルを活かすことで、
                将来に向けて人間関係やビジネス関係を築くチャンスが生まれる可能性があります。
            </p>
        </div>

        <div data-aos="fade-up" data-aos-duration="500" id="jobs">
            <p>貴重なスキルや経験が得られるだけでなく、ボランティア活動に参加することで、
                将来のメンター（指導者）に出会ったり、仕事上の人脈が広がることが期待できるでしょう。
                参加している活動の分野でキャリアを積むことを選択した場合は、人脈とともに仕事の可能性も広がるかもしれません。
            </p>
            <a href="#jobs"><img src="./image/merit4.png"></a>          
        </div>
        
    </section>

    <div id="deco_hm">
        <img src="./image/HT_Fox FrontPage2.png">
    </div>

    <?php include('./Navbar/footer.php'); ?>

    <script src="./js/navbar.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>


</body>

</html>