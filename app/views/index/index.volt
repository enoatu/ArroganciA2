{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
{% if registerd is defined %}
 <div class="alert alert-success" role="alert">登録しました。<h3><b>3秒後</b>にログイン画面に移動します。</h3></div>
{% endif %}

<h1>
    ArroganciA
</h1>
<p>グローバル</p>
<div>
    {{linkTo("tables/index/app", "アプリ")}}
    {{linkTo("tables/index/game", "ゲーム")}}
    {{linkTo("tables/index", "グローバルテーブル!")}}
    {{linkTo("tables/index", "グローバルテーブル!")}}
    {{linkTo("tables/index", "グローバルテーブル!")}}
</div>
<p>ローカル</p>
<div>
    {{linkTo("tables/index", "グローバルテーブル!")}}
    {{linkTo("tables/index", "グローバルテーブル!")}}
    {{linkTo("tables/index", "グローバルテーブル!")}}
    {{linkTo("tables/index", "グローバルテーブル!")}}
    {{linkTo("tables/index", "グローバルテーブル!")}}
</div>



</div>
{% include "layouts/footer.volt" %}
