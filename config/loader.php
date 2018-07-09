<?php
use Phalcon\Loader;

//例ではあらかじめ定義されたディレクトリに基づいてクラスを検索することにする	
$loader = new Loader();
$loader->registerDirs(
    [
        '../app/controllers/',
        '../app/controllers/Member/',
        '../app/controllers/Supports/',
        '../app/controllers/Tables/',
        '../app/controllers/Api/',
        '../app/models/',
        '../app/models/Tweet/',
        '../app/models/Iine/',
    ]
);
$loader->registerNamespaces(
    [
        "ArroganciA\Model"       => "../app/models/",
        "ArroganciA\Model\Tweet" => "../app/models/Tweet/",
        "ArroganciA\Model\Iine"  => "../app/models/Iine/",
        "ArroganciA\Controller"  => "../app/controllers/"
    ]
);

$loader->register();

