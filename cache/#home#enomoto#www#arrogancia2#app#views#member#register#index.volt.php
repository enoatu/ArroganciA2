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
</head>
<body>

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
<h1>
   <?= $title ?>
</h1>
<div id="form-wrap" align="center" >
<?= $this->tag->form(['register/register']) ?>
 <div class="form-group">
    <label>お名前</label>
    <input type="text" name="username" class="form-control" placeholder="佐藤 花子" required>
  </div>
 <div class="form-group">
    <label>メールアドレス</label>
    <input type="email" name="email" class="form-control" placeholder="hanako@mail.com" required>
  </div>
<div class="form-group">
    <label>パスワード</label>
    <input type="password" name="password" class="form-control" placeholder="abcd1234" required>
</div>
<button type="submit" class="btn btn-default">以下に同意して登録</button>
<?= $this->tag->endForm() ?>
<div>
</form>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
<html>

