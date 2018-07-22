<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class LoginController extends ControllerBase {

    public function indexAction() {
        $this->view->setVar("title", "ログイン");
        $this->assets->addCss('css/index.css', true);
        $this->assets->addCss('css/table/index.css', true);
    }

    public function loginAction() {
        if (!$this->request->isPost()) {
            $this->redirect('login');
         }
        $nameOrMail = $this->request->getPost("nameOrMail",'string');
        $password   = $this->request->getPost("password", 'string');
        //find user
        $user = $this->findUser($nameOrMail);
        $this->logger->info("pass " . $password);
        $this->logger->info("modelpass " . $user->user_pass);
        //check find user
        if (!$user || !$this->security->checkHash($password, $user->user_pass)) {
             //find user failed
            $this->failedLogin();
            return $this->redirect('login');
        }

        //save new token success
        $this->session->set('user', [
            'id' => $user->user_id,
            'name' => $user->user_name,
        ]);
        $this->session->set('info', [
            'info' => 'success',
            'msg'  => 'ログインしました',
        ]); 
        return $this->redirect('index');
    }

    public function guestAction() {
        $this->session->set('user', [
            'id' => 32,
            'name' => "ゲストユーザー",
        ]);
        $this->session->set('info', [
            'info' => 'success',
            'msg'  => 'ログインしました',
        ]); 
        return $this->redirect('index');
    }

    private function findUser($nom) {
        $user  = Users::findFirstByUser_name($nom);
        if ($user) return $user;
        $user = Users::findFirstByUser_email($nom);
        return $user;
    }

    private function failedLogin() {
        $this->session->set('info', [
            'info' => 'warning',
            'msg'  => '入力されたユーザー名やパスワードが正しくありません。確認してからやりなおしてください。'
        ]);
        $this->logger->error('ログイン失敗');
    }

}

