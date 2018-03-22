<?php

use Phalcon\Mvc\Controller;

class ResultController extends Controller
{
    public function indexAction() {
    $this->assets->addCss(
            '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css',
            false
        );
    $this->assets->addCss('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css'
        ,false);
    $this->assets->addJs('http://code.jquery.com/jquery-latest.min.js',false);
    $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js',false);
    $this->assets->addJs('js/result.js');
    $text = new Texts();

    $this->
    $request_uri =  $_SERVER["REQUEST_URI"];
    $this->view->uri = $request_uri;
    
     #$this->view->disable();
    }

    public function resultAction() {
        
    }

}
