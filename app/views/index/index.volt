{% include "components/header.volt" %}
{% include "components/globalMenu.volt" %}
<div id="wrap">
{% if registerd is defined %}
 <div class="alert alert-success" role="alert">登録しました。<h3><b>3秒後</b>にログイン画面に移動します。</h3></div>
{% endif %}

<h1>
    ArroganciA
</h1>
{{ tag.form("index/register") }}
{{ tag.textarea("text") }}
<p>
{{ tag.submitButton("Make") }}
</p>
</form>
</div>
{% include "components/footer.volt" %}
