<nav id="topbar"  class="navbar navbar-default navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
      <span class="sr-only">メニュー</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div id="AA">
      <a href="{{ url('') }}"><img id="AAImg" src="{{ url('img/ico.ico') }}" alt="AA"></a>
      <a id="title" href="{{ url('') }}" class="navbar-brand" >ArroganciA</a>
  </div>
  <div id="gnavi" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right" style="font-size: 23px">
          <li class="mtext"><a class="url" href="{{ url('') }}"><img src="{{ url('img/home.png') }}"></a></li>
          <li class="mtext"><div class="dropdown">
                  <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-toggle="tooltip" data-placement="left" title="ツールチップ（下）" data-delay="0">
                      <img src="{{ url('img/db.png') }}">
                      <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                      <li role="presentation"><a href="{{ url('table/index/app') }}">アプリ</a></li>
                      <li role="presentation"><a href="{{ url('table/index/site') }}">サイト</a></li>
                      <li role="presentation"><a href="{{ url('table/index/service') }}">サービス</a></li>
                      <li role="presentation"><a href="{{ url('table/index/system') }}">システム</a></li>
                      <li role="presentation"><a href="{{ url('table/index/game') }}">ゲーム</a></li>
                  </ul>
              </div>
          </li>
          <li class="mtext"><div class="dropdown">
                  <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                      <img src="{{ url('img/star.png') }}">
                      <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                      <li role="presentation"><a href="{{ url('table/local/app') }}">アプリ</a></li>
                      <li role="presentation"><a href="{{ url('table/local/site') }}">サイト</a></li>
                      <li role="presentation"><a href="{{ url('table/local/service') }}">サービス</a></li>
                      <li role="presentation"><a href="{{ url('table/local/system') }}">システム</a></li>
                      <li role="presentation"><a href="{{ url('table/local/game') }}">ゲーム</a></li>
                  </ul>
              </div>
          </li>
          <li class="mtext"><a class="url" href="{{ url('usecase') }}"><img src="{{ url('img/usecase.png') }}"></a></li>
          <li class="mtext"><a class="url" href="{{ url('account') }}"><img src="{{ url('img/account.png') }}"></a></li>
          <li class="mtext"><a class="url" href="{{ url('config') }}"><img src="{{ url('img/setting.png') }}"></a></li>

              <!--<li class="mtext"><a class="url" href="{{ url('request') }}"><img src="{{ url('img/home.png') }}"></a></li>
                  <li class="mtext"><a class="url" href="{{ url('register') }}"><img src="{{ url('img/home.png') }}"></a></li>
                  <li class="mtext"><a class="url" href="{ url('share') }}"><img src="{{ url('img/home.png') }}"></a></li>
                  <li class="mtext"><a class="url" href="{{ url('resign') }}"><img src="{{ url('img/star.png') }}"></a></li>-->
      </ul>
  </div>
</nav>
