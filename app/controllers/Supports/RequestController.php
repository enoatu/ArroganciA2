<?php

use Phalcon\Mvc\Controller;

class RequestController extends Controller
{

    public function indexAction() {
        $this->view->title = "要望・リクエスト";
        $this->assets->addCss('css/index.css');
           }

    public function registerAction() {

          }
    
    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

