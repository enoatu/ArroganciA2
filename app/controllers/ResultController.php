<?php

use Phalcon\Mvc\Controller;

class ResultController extends Controller
{
    public function indexAction(){
        $this->assets->addCss(
            '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css',
            false
        ); 

         $text = new Texts();
        $request_uri =  $_SERVER["REQUEST_URI"];
        
        $this->view->uri = $request_uri;
    }

}
