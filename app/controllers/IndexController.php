<?php
use ArroganciA\Controller\ControllerBase;

class IndexController extends ControllerBase {

    public function initialize() {
        $this->view->title = "Home";
        $this->view->name = "";
           // $this->cookies->get('ArroganciA_u')->getValue();

        $this->assets->addCss('css/index.css');
        $this->authenticate();
    }

    public function indexAction() {

    }

    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

