<?php

use Phalcon\Mvc\Controller;

class UsecaseController extends Controller
{

    public function indexAction() {
        $this->view->title = "使い方"; 
        $this->assets->addCss('css/index.css');
    }

    public function registerAction() {

          }
    
    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

