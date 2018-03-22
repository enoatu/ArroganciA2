<?php
# 
# Atsushi ENOMOTO <enotiru@moove.co.jp>
# moove Co., Ltd.

$di->set('router', function(){
    $router = new \Phalcon\Mvc\Router();

    $router->add(
        '/result/:params',
        [
            'controller' => 'result',
            'action'     => 'index',
            'params'     => 1
        ]
    );

    $router->add(
        '/',
        [
            'controller' => 'index',
            'action'     => 'index',
            'params'     => 1
        ]
    );

    $router->notFound(
        [
            'controller' => 'index',
            'action'     => 'show404'
        ]
    );
    return $router;
});
