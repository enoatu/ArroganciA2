<?php
use Phalcon\Logger\Adapter\File as FileAdapter;

$di->setShared('logger', function () {
    $logger = new FileAdapter(
        '../log/error.log',
        [
            'mode' => 'w'
        ]
    );
    return $logger;
});
