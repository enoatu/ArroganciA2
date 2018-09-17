{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
    {{ title }}
</h1> 
<p>ようこそ{% if name is defined %}{{ name }}{% else %}ゲストユーザー{% endif %}さん</p>
{% if name is not defined %}
    {% include "index/guest.volt" %}
{% endif %}
<div class="container">
    <div class="jumbotron">
        <h1>ArroganciA<h1>
        <p>売れそうなアプリやシステムなどのアイディアをTwitterから収集する支援ツールです。</p>
        <p>売れそうなアプリやシステムなどのアイディアをTwitterから収集するアプリです。。アプリやwebサイト等を作りたいな、と思った時、何を作ればいいのかわからない。</p>
        <p>
 そのような時はArroganciAを利用してみるのはいかがでしょうか？ArroganciAを利用すれば現在進行形の流行に乗ることができ、豊富にある組み込まれたリソースを駆使すれば需要のあるアプリ、webサイト、システム、サービス等の情報を入手し、管理することができます。
        </p>
    </div>
    <div>
    <div class="jumbotron" align="center">
        <h2>データ分析</h2>
        <p>もっとも今ホットなワードは...  ->
        <a href="http://enotiru.com/ArroganciA/index.html">データ分析ページへ</a></p>
    </div>
</div>

</div>

<h3>ほかの制作アプリ</h3>
<div align="center">
    <p><a href="https://enoatu.com/">ホームページ</a></p>
    <p><a href="https://enoatu.com/apps/webcam/">ウェブカメラ</a></p>
    <p><a href="https://enoatu.com/games/rojokabaddi/">路上カバディ</a></p>
    <p><a href="https://enoatu.com/CriticalPathFinder/">クリティカルパス</a></p>
    <p><a href="https://enoatu.com/DispJanet">あなたの残り寿命</a></p>
    <p><a href="https://enoatu.com/GyakuPOpener">逆ポーランド</a></p>
    <p><a href="https://enoatu.com/nopaste">nopaste</a></p>
    <p><a href="https://enoatu.com/Vdisp">出力補助</a></p>
    <p><a href="https://enoatu.com/買うモナールnext">買うモナールnext</a></p>
    <p><a href="https://enoatu.com/memo/alter_memo">メモアプリ</a></p>
</div>
</div>
{% include "layouts/footer.volt" %}
