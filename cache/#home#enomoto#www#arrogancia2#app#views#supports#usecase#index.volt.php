<!DOCTYPE html>
<html lang="ja">
<head>
    <title><?= $title ?></title>
    <link rel="apple-touch-icon" href="<?= $this->url->get('img/ico.ico') ?>">
    <link rel="icon" href="<?= $this->url->get('img/ico.ico') ?>">
    <link rel="shortcut icon" href="<?= $this->url->get('img/ico.ico') ?>">
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#4285f4">
    <?= $this->assets->outputCss() ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
   <!-- <link rel="stylesheet" href="<?= $this->url->get('css/bootstrap.min.css') ?>">
   <link rel="manifest" href="https://enoatu.com/ArroganciA2/manifest.json"> -->
</head>
<body>
 <script>
    // service workerが有効なら、service-worker.js を登録します
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register("<?= $this->url->get('./service-worker.js') ?>");
    }   
</script>


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

<div id="wrap">
<div class="page-header">
    <h1>
        <?= $title ?>
    </h1>
</div>
<div>
    <h3 align="left">あなたが需要のあるアプリ/webサイト/システム/etc.を探したい時 </h3>
    <h3 align="left"><b>1</b> グローバルテーブルでそれを探します。</h2>
    <h3 align="left"><b>2</b> いいものがあったらそれらを選択して[入]ボタンをクリック。
    ローカルテーブルに追加されます</h2>
    <h3 align="left"><b>3</b> これでアイディアをいつでも見たい時に見れます。需要があり、人の役に立つものを制作しましょう。</h2><img src="images/hellowork_computer.png">
</div>
<div class="page-header">
    <h1 class="kojin">くわしい使い方</h1>
</div>
        ＊スライドが小さく表示されてしまう場合はブラウザのウィンドウサイズを上下させてみてください。
    <div align="center" style="width: 100% ">
        <h3 align="center">あなたが需要のあるアプリ/webサイト/システムを探したい時</h2><br>
<!--    <iframe align="center" src='https://scitacjp-my.sharepoint.com/personal/s3701_scit_ac_jp/_layouts/15/guestaccess.aspx?docid=04ea0c6be70654f61bcaa9e4b58b60f78&authkey=AdjsmBXNmtnhMJYVK5DHKqE&action=embedview&wdAr=1.7777777777777777'-->
<!--                width='100%' height='60%' frameborder='0'></iframe>-->
        <iframe src="https://docs.google.com/presentation/d/114pri1tXzrA_OAQUF7ot8E8k4rjEb1rDAifGewlE0SM/embed?start=false&loop=false&delayms=60000"
                frameborder="0" width="500px" height="500px" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        <iframe src="https://docs.google.com/presentation/d/1TAwyYnpl1b_AkaRGLmOjLMVQCmOA70uX4xfMWh9ovHk/embed?start=false&loop=false&delayms=60000"
                frameborder="0" width="500px" height="500px" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
    <table>
        <tr>
            <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
            <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
    <br>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<?= $this->assets->outputJs() ?>
<?php if (isset($info) && isset($msg)) { ?>
<?= '<script>info("' . $info . '", "' . $msg . '");</script>' ?>
<?php } ?>
<?php if (isset($global)) { ?>
<script>
function post(id, tweet_id) {
    $.ajax({
        type: 'post',
        url: '<?= $this->url->get('Api/register') ?>',
        data: {
            'session_id': $.cookie('PHPSESSID'),
            'tweet_id': tweet_id,
            'kind': '<?= $kind ?>'
        },
        success: function(data) {
            $(function(){
                console.log(tweet_id);
                $(id).children('img').attr('src','<?= $this->url->get('img/home.png') ?>');
            });
        },
        error: function () {
            alert("読み込み失敗");
        }
    });
}
</script>

<?php } ?>
</body>
<html>


