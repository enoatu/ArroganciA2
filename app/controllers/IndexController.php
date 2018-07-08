<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{   
    public function initialize() {
        $this->view->title = "Home";
        $this->assets->addCss('css/index.css');
        $this->authenticate();
    }
    public function indexAction() {

    }

    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

