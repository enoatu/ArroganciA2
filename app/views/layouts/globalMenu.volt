<nav id="topbar"  class="navbar navbar-default navbar-fixed-top" style="min-height: 30px;">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
      <span class="sr-only">メニュー</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div id="AA">
      <a href="{{ url('') }}"><img id="AAImg" src="{{ url('img/ico.ico') }}" ></a>
      <a id="title" href="{{ url('') }}" class="navbar-brand" >ArroganciA</a>
  </div>
    <div id="gnavi" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right" style="font-size: 23px">
      <li class="mtext"><a href="{{ url('useCase') }}">使い方</a></li>
      <li class="mtext"><a href="{{ url('resign') }}">アカウント</a></li>
      <li class="mtext"><a href="{{ url('request') }}">リクエスト</a></li>
      <li class="mtext"><a href="{{ url('config') }}">表示設定</a></li>
      <li class="mtext"><a href="{{ url('register') }}">登録する</a></li>
      <li class="mtext"><a href="{{ url('share') }}">共有する</a></li>
    </ul>
  </div>
</nav>


