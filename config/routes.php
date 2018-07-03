<?php
# 
# Atsushi ENOMOTO <enotiru@moove.co.jp>
# moove Co., Ltd.

$di->set('router', function(){
    $router = new \Phalcon\Mvc\Router(false);
    $router->removeExtraSlashes(true);
    $router->add(
        '/',
        [
            'controller' => 'index',
            'action'     => 'index'
        ]
    );

    $router->add(
        '/:controller',
        [
            'controller' => 1,
            'action'     => 'index',
        ]
    );

    $router->add(
        '/:controller/:action',
        [
            'controller' => 1,
            'action'     => 2,
        ]
    );

    $router->add(
        '/:controller/:action/:params',
        [
            'controller' => 1,
            'action'     => 2,
            'kind'  => 3,
        ]
    );

    $router->add(
        '/:controller/:action/:params/:params',
        [
            'controller' => 1,
            'action'     => 2,
            'kind'       => 3,
            'parameter'  => 4,

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
