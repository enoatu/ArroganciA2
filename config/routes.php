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
            'action'     => 'index',
        ]
    );

     $router->add(
        #'/index/register',
        '/:controller/(.+)',
        [
            'controller' => 1,
            'action'     => 2,
        ]
    );

    $router->add(
        '/result/:params',
        [
            'controller' => 'result',
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
