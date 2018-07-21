{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
   {{ title }}
</h1>
<div id="form-wrap" align="center" >
{{ form('login/login') }}
 <div class="form-group">
    <label>お名前またはメールアドレス</label>
    <input type="text" name="nameOrMail" class="form-control" placeholder="佐藤 花子/hanako@gmail.com" required>
 <div class="form-group">
    <label>パスワード</label>
    <input type="password" name="password" class="form-control" placeholder="abcd1234" required>
</div>
<button type="submit" class="btn btn-default">ログイン</button>
{{ end_form() }}
</div>
{{ form('login/guest') }}
<button type="submit" class="btn btn-default">ゲストユーザーでログイン</button>
{{ end_form() }}
</div>
{% include "layouts/footer.volt" %}
