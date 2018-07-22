<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class LogoutController extends ControllerBase {
    public function initialize(){
    }

    public function indexAction() {
        $this->view->setVar("title", "ログアウト確認画面");
        $this->assets->addCss('css/index.css');
    }

    public function logoutAction() {
        if($this->request->isPost()) {
            $this->session->remove('user');
            $this->session->set('info', [
                'info' => 'success',
                'msg'  => 'ログアウトしました。'
            ]);
            return $this->redirect('index');        
        }
    }
}
