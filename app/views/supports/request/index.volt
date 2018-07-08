{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
   {{ title }}
</h1>
<div id="form-wrap" align="center" >
{{ form('request/register') }}
 <div class="form-group">
    <label>お名前</label>
    <input type="text" name="username" class="form-control" placeholder="佐藤 花子" required>
  </div>
 <div class="form-group">
    <label>メールアドレス</label>
    <input type="email" name="email" class="form-control" placeholder="hanako@mail.com" required>
  </div>
<div class="form-group">
    <label>要望</label>
    <textarea class="form-control" placeholder="要望を入力してください" required></textarea>
</div>
<button type="submit" class="btn btn-default">送信する</button>
{{ end_form() }}
<div>
</div>
{% include "layouts/footer.volt" %}
