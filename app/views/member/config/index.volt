{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<form method="post" action="{{ url('config/register')}}">  <div align="left" style="padding:3%;margin-left:10%;">
        <label><input type="radio" name="kindofdisp" value=0 required>| ツイート | □ | ユーザ名 | アカウント名 | 日時 |</label>
        <br><br><br>
        <label><input type="radio" name="kindofdisp" value=1 required>| ツイート | □ | ユーザ名 | 日時 |</label>
        <br><br><br>
        <label><input type="radio" name="kindofdisp" value=2 required>| ツイート | □ | アカウント名 | 日時 |</label>
        <br><br><br>
        <label><input type="radio" name="kindofdisp" value=3 required>| ツイート | □ | 日時 |
            <br> ↑☆<b>デフォルト☆</b></label>
        <br><br>
        <label><input type="radio" name="kindofdisp" value=4 required>| ツイート | □ |　　　　　　　　　
            <br>↑☆<b>スマートデバイス向け</b>☆</label>
        <br><br>
    </div>
    <button type="submit" value="" style="font-size: 1.3em ;width: 15%; ">設定</button>
</form>

{% include "layouts/header.volt" %}
