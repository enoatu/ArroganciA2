<?php
# 
# Atsushi ENOMOTO <enotiru@moove.co.jp> 
# moove Co., Ltd.

$this->assets->addCss(
            '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css',
            false
        );
        $this->assets->addCss('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css'
            ,false);
        $this->assets->addJs('http://code.jquery.com/jquery-latest.min.js',false);
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js',false);
        $this->assets->addJs('js/result.js');

