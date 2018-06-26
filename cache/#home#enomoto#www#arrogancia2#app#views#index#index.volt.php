<!DOCTYPE html>
<html lang="ja">
<head>
    <title><?= $title ?></title>
    <link rel="apple-touch-icon" href="<?= $this->url->get('img/ico.ico') ?>">
    <link rel="icon" href="<?= $this->url->get('img/ico.ico') ?>">
    <link rel="shortcut icon" href="<?= $this->url->get('img/ico.ico') ?>">
    <meta name="viewport" content="width=device-width">
    <?php $this->assets->outputCss(); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="manifest" href="<?= $this->url->get('./manifest.json') ?>">
</head>
<body>
 <script>
    // service workerが有効なら、service-worker.js を登録します
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register("<?= $this->url->get('js/service-worker.js') ?>");
    }   
</script>


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



<div id="wrap">
<?php if (isset($registerd)) { ?>
 <div class="alert alert-success" role="alert">登録しました。<h3><b>3秒後</b>にログイン画面に移動します。</h3></div>
<?php } ?>

<h1>
    ArroganciA
</h1>
<?= $this->tag->form('index/register') ?>
<?= $this->tag->textarea('text') ?>
<p>
<?= $this->tag->submitButton('Make') ?>
</p>
</form>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
<html>

