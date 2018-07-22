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
                    <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <img src="{{ url('img/db.png') }}">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="move-menu1" role="menu">
                        <li role="presentation"><a href="{{ url('tables/index/app') }}">アプリ</a></li>
                        <li role="presentation"><a href="{{ url('tables/index/site') }}">サイト</a></li>
                        <li role="presentation"><a href="{{ url('tables/index/service') }}">サービス</a></li>
                        <li role="presentation"><a href="{{ url('tables/index/system') }}">システム</a></li>
                        <li role="presentation"><a href="{{ url('tables/index/game') }}">ゲーム</a></li>
                    </ul>
                </div>
            </li>
            <li class="mtext"><div class="dropdown">
                    <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <img src="{{ url('img/star.png') }}">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="move-menu2" role="menu">
                        <li role="presentation"><a href="{{ url('tables/local/app') }}">アプリ</a></li>
                        <li role="presentation"><a href="{{ url('tables/local/site') }}">サイト</a></li>
                        <li role="presentation"><a href="{{ url('tables/local/service') }}">サービス</a></li>
                        <li role="presentation"><a href="{{ url('tables/local/system') }}">システム</a></li>
                        <li role="presentation"><a href="{{ url('tables/local/game') }}">ゲーム</a></li>
                    </ul>
                </div>
            </li>
            <li class="mtext"><a class="url" href="{{ url('usecase') }}"><img src="{{ url('img/usecase.png') }}"></a></li>
            <li class="mtext"><a class="url" href="{{ url('account') }}"><img src="{{ url('img/account.png') }}"></a></li>
            <li class="mtext"><div class="dropdown">
                    <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">                                             <img src="{{ url('img/others.png') }}">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="move-menu3" role="menu">
                        <li role="presentation"><a href="{{ url('config') }}">設定</a></li>
                        <li role="presentation"><a href="{{ url('share') }}">共有</a></li>
                        <li role="presentation"><a href="{{ url('login') }}">別アカウントにログイン</a></li>
                        <li role="presentation"><a href="{{ url('request') }}">要望・リクエスト</a></li>
                        <li role="presentation"><a href="{{ url('logout') }}">ログアウト</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
