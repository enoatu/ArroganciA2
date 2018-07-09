<?php
//****Bootstrap ファイルをつくる*******
//****MVC アプリケーションの設定*******
//
//ひとつ、オートローダの登録
//ふたつ、依存性の管理　
//みっつ、リクエストの対処
//
//
//[1]オートローダの登録　アプリケーション内のコントローラやモデルなどのクラスをロードするために使用　　例としてPhalcon\Loaderコンポーネントを使用　
include __DIR__ . '/loader.php';

//[2]依存性の管理
//
////DIコンテナ = dependency injection container
//サービスコンテナは、アプリケーションが機能するために使用するサービスをグローバルに保存する入れ物?
//Phalcon\Di は接着剤として機能
//


use Phalcon\Di\FactoryDefault;

//DIコンテナをつくる
$di = new FactoryDefault();
//↑Phalcon\Di\FactoryDefault は Phalcon\Di の亜種です。処理をシンプルにするため、Phalcon に付属しているコンポーネントのほとんどが登録されています。 従って、それらをひとつひとつ登録するべきではありません。あとで生成するサービスを変更しても問題ありません。
//
//フレームワークが view ファイルを探すディレクトリを示す “view” サービスを登録します。
//viewコンポーネントの組み立て
//
include __DIR__ . '/view.php';

//Phalconにより生成されるすべてのURIにtutorialが含まれるようにbase URIを登録します。
//ハイパーリンクを生成するために、Phalcon\Tagを使用する際に重要になってきます。
//
use Phalcon\Mvc\Url as UrlProvider;

//ベースURIを設定して、生成される全てのURIがtutorialを含むようにする
//ベースURIとローカルベースURIという言葉は同じ？（未確認）
$di->set(
    'url',
    function(){
        $url = new UrlProvider();
        $url->setBaseUri('https://enoatu.com/ArroganciA2/');//<-現在のプロジェクトまでのURLのパスを入れる
        return $url;
    }
);

include __DIR__ . '/routes.php';
//[3]リクエストの対処
//この目的は、リクエスト環境を初期化し、リクエストのルートを決め、発見したアクションを起動することであり、処理が完了した際にレスポンスを集約し、返却することです
//
include __DIR__ . '/encrypt.php';

use Phalcon\Mvc\Model\Manager as ModelsManager;
$di->set(
    "modelsManager",
    function() {
        return new ModelsManager();
    }
);

include __DIR__ . '/logger.php';
include __DIR__ . '/db.php';

//セッションのセットアップ
use Phalcon\Session\Adapter\Files as Session;

$di->setShared('session', function(){
    $session = new Session();
    $session->start();
    return $session;
});

use Phalcon\Mvc\Application;

$application = new Application($di);
try{
    //リクエストを処理する
    $response = $application->handle();

    $response->send();
} catch(\Exception $e) {//エラーになったらメッセージ
    echo 'Exception: ', $e->getMessage();
}

