<?php
$di->set('dispatcher',function() {
    $eventsManager = new \Phalcon\Events\Manager();
    $eventsManager->attach('dispatch:beforeException', function($event, $dispatcher, $exception) {
        switch ($exception->getCode()) {
        case \Phalcon\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
        case \Phalcon\Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
            //任意の飛び先を指定
            $dispatcher->forward(array(
                'controller'=>'index',
                'action'    =>'show404'
            ));
            return false;
        }
    });

    //Dispatcherの基本動作を設定
    $dispatcher = new \Phalcon\Mvc\Dispatcher();
    $dispatcher->setEventsManager($eventsManager);
    return $dispatcher;
});
