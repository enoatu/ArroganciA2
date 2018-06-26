<nav class="navbar navbar-default navbar-fixed-top" style="min-height: 30px;">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
      <span class="sr-only">メニュー</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
 
  <img src="<?= $this->url->get('img/ico.ico') ?>" style="height: 80px; width: 80px; float : left">
  <a href="#" id="title" class="navbar-brand" >ArroganciA</a>
    <div id="gnavi" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right" style="font-size: 23px">
      <li class="mtext"><a href="<?= $this->url->get('useCase/index') ?>">使い方</a></li>
      <li class="mtext"><a href="<?= $this->url->get('resign/index') ?>">アカウント</a></li>
      <li class="mtext"><a href="<?= $this->url->get('request/index') ?>">リクエスト</a></li>
      <li class="mtext"><a href="<?= $this->url->get('config/index') ?>">表示設定</a></li>
      <li class="mtext"><a href="<?= $this->url->get('register/index') ?>">登録する</a></li>
      <li class="mtext"><a href="<?= $this->url->get('share/index') ?>">共有する</a></li>
    </ul>
  </div>
</nav>


