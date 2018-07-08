<?php

use Phalcon\Crypt;

$di->setShared(
    'crypt',
    function () {
        $crypt = new Crypt();
        $crypt->setCipher('aes-256-ctr');
        $key = "T4\xb1\x8d\xa9\x98\x054t7w!z%C*F-Jk\x98\x05\\\x5c";
        $crypt->setKey($key);
        return $crypt;
    }
);
