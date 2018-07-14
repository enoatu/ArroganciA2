<?php
use ArroganciA\Controller\ControllerBase;

class IndexController extends ControllerBase {

    public function initialize() {
        $this->view->title = 'Home';
        if ($this->session->has('user')) {
            $this->view->name = $this->session->get('user')['name'];
        }
        if ($this->session->get('info')['info']) {
            $this->view->setVar('info', $this->session->get('info')['info']);
            $this->view->setVar('msg', $this->session->get('info')['msg']);
            $this->session->remove('info');
        }

        // $this->cookies->get('ArroganciA_u')->getValue();

        $this->assets->addCss('css/index.css');
        $this->assets->addJs('js/info.js');
    }

    public function indexAction() {
        $this->authenticate();
    }

    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

