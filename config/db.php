<?php
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

//データベースサービスのセットアップ
$di->setShared(
    'db',
    function(){
        return new DbAdapter(
            [
                'host' => 'localhost',
                'username' => 'user2',
                'password' => 'pass',
                'dbname' => 'user2db',
            ]
        );
    }
);

