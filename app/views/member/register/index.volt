{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
   {{ title }}
</h1>
<div id="form-wrap" align="center" >
{{ form('register/register') }}
 <div class="form-group">
    <label>お名前</label>
    <input type="text" name="username" class="form-control" placeholder="佐藤 花子" required>
  </div>
 <div class="form-group">
    <label>メールアドレス</label>
    <input type="email" name="email" class="form-control" placeholder="hanako@mail.com" required>
  </div>
<div class="form-group">
    <label>パスワード</label>
    <input type="password" name="password" class="form-control" placeholder="abcd1234" required>
</div>
<button type="submit" class="btn btn-default">以下に同意して登録</button>
{{ end_form() }}
<div>
</form>
</div>
{% include "layouts/footer.volt" %}
