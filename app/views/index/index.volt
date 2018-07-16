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
        <h1>ArroganciAチュートリアル</h1>
        <p>売れそうなアプリやシステムなどのアイディアをTwitterから収集する支援ツールです。</p>
        <p>売れそうなアプリやシステムなどのアイディアをTwitterから収集するアプリです。。アプリやwebサイト等を作りたいな、と思った時、何を作ればいいのかわからない。</p>
        <p>
 そのような時はArroganciAを利用してみるのはいかがでしょうか？ArroganciAを利用すれば現在進行形の流行に乗ることができ、豊富にある組み込まれたリソースを駆使すれば需要のあるアプリ、webサイト、システム、サービス等の情報を入手し、管理することができます。
        </p>
    </div>
</div>
<p>グローバル</p>
<div>
    {{linkTo("tables/index/app", "アプリ")}}
    {{linkTo("tables/index/game", "ゲーム")}}
    {{linkTo("tables/index/site", "サイト")}}
    {{linkTo("tables/index/service", "サービス")}}
    {{linkTo("tables/index/sys", "システム")}}
</div>
<p>ローカル</p>
<div>  
    {{linkTo("tables/local/app", "アプリ")}}
    {{linkTo("tables/local/game", "ゲーム")}}
    {{linkTo("tables/local/site", "サイト")}}
    {{linkTo("tables/local/service", "サービス")}}
    {{linkTo("tables/local/sys", "システム")}}
</div>
</div>
{% include "layouts/footer.volt" %}
