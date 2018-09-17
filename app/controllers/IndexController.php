<?php
use ArroganciA\Controller\ControllerBase;

class IndexController extends ControllerBase {

    public function initialize() { 
    }

    public function indexAction() {
        $this->authenticate();
        $this->view->title = 'Home';
        if ($this->session->has('user')) {
            $this->view->name = $this->session->get('user')['name'];
            $this->session->remove('info');
        }
        $this->assets->addCss('css/index.css');
        $this->assets->addJs('js/info.js');
    }

    public function show404Action() {
    }
}

