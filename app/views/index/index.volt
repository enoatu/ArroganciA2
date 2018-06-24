{% include "components/header.volt" %}
<nav class="navbar navbar-default navbar-fixed-top" style="min-height: 30px;">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
      <span class="sr-only">メニュー</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
 
  <img src="{{ url('img/ico.ico') }}" style="height: 80px; width: 80px; float : left">
  <a href="#" class="navbar-brand" style="height: 80px; width: 250px; font-size: 30px;line-height: 40px;">ArroganciA</a>
  <div style="font-size: 40px; line-height: 70px;">{{ title }}</div>
    <div id="gnavi" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right" style="font-size: 25px">
      <li><a href="">使い方</a></li>
      <li><a href="">アカウント</a></li>
      <li><a href="">リクエスト</a></li>
      <li><a href="">表示設定</a></li>
      <li><a href="">ログアウト</a></li>
      <li><a href="">共有する</a></li>
    </ul>
  </div>
</nav>
<br><br>
<br><br>
    <h1>
        ArroganciA
   </h1>
    <?php echo $this->tag->form("index/register");?>

    <?php echo $this->tag->textarea("text");?>
    
    <p>
    <?php echo $this->tag->submitButton("Make");?>
    </p>
    </form>
{% include "components/footer.volt" %}
