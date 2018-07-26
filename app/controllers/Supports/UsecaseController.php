<?php
use ArroganciA\Controller\ControllerBase;

class UsecaseController extends ControllerBase {
    public function indexAction() {
        $this->view->title = "使い方"; 
        $this->assets->addCss('css/index.css');
    }
}

