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
      <a href="<?= $this->url->get('') ?>"><img id="AAImg" src="<?= $this->url->get('img/ico.ico') ?>" alt="AA"></a>
      <a id="title" href="<?= $this->url->get('') ?>" class="navbar-brand" >ArroganciA</a>
  </div>
  <div id="gnavi" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right" style="font-size: 23px">
          <li class="mtext"><a class="url" href="<?= $this->url->get('') ?>"><img src="<?= $this->url->get('img/home.png') ?>"></a></li>
          <li class="mtext"><div class="dropdown">
                  <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                      <img src="<?= $this->url->get('img/db.png') ?>">
                      <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                      <li role="presentation"><a href="<?= $this->url->get('tables/index/app') ?>">アプリ</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/index/site') ?>">サイト</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/index/service') ?>">サービス</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/index/system') ?>">システム</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/index/game') ?>">ゲーム</a></li>
                  </ul>
              </div>
          </li>
          <li class="mtext"><div class="dropdown">
                  <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                      <img src="<?= $this->url->get('img/star.png') ?>">
                      <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                      <li role="presentation"><a href="<?= $this->url->get('tables/local/app') ?>">アプリ</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/local/site') ?>">サイト</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/local/service') ?>">サービス</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/local/system') ?>">システム</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('tables/local/game') ?>">ゲーム</a></li>
                  </ul>
              </div>
          </li>
          <li class="mtext"><a class="url" href="<?= $this->url->get('usecase') ?>"><img src="<?= $this->url->get('img/usecase.png') ?>"></a></li>
          <li class="mtext"><a class="url" href="<?= $this->url->get('account') ?>"><img src="<?= $this->url->get('img/account.png') ?>"></a></li>
          <li class="mtext"><div class="dropdown">
                  <button class="url btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">                                <img src="<?= $this->url->get('img/others.png') ?>">
                      <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                      <li role="presentation"><a href="<?= $this->url->get('config') ?>">設定</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('share') ?>">共有</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('login') ?>">別アカウントにログイン</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('request') ?>">要望・リクエスト</a></li>
                      <li role="presentation"><a href="<?= $this->url->get('logout') ?>">ログアウト</a></li>
                  </ul>
              </div>
          </li>
      </ul>
  </div>
</nav>
