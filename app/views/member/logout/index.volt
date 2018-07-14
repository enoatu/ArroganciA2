{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
    {{ title }}
</h1>
<h2>
    ログアウトしますか？
</h2>
<div id="form-wrap" align="center" >
{{ form('logout/logout') }}
 <input type="hidden" name="logout" class="form-control" value="1">
 <button type="submit" class="btn btn-default">ログアウトする</button>
{{ end_form() }}
<div>
</form>
</div>
{% include "layouts/footer.volt" %}
