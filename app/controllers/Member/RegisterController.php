<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class RegisterController extends ControllerBase {
    public function initialize(){
        $this->authenticate();
        $this->view->setVar('title', 'メンバー登録');
        $this->assets->addCss('css/index.css');
    }

    public function indexAction() {
        if ($this->session->has('info')) {
            if ($this->session->get('info')['info']) {
                $this->view->setVar('info', $this->session->get('info')['info']);
                $this->view->setVar('msg', $this->session->get('info')['msg']);
                $this->session->remove('info');
            }
        }
    }

    public function registerAction() {
        if (!$this->request->isPost()) {
            $this->logger->warn('postされませんでした');
            return $this->dispatcher->forward([
                'controller' => 'register',
                'action'     => 'index'
            ]);
        }
        $user             = new Users;
        $username         = $this->request->getPost('username', 'string');
        $user->user_name  = $username;
        $user->user_email = $this->request->getPost('email', 'email');
        $password         = $this->request->getPost('password');
        $user->user_pass  = $this->security->hash($password);
        $success          = $user->save();

        if (!$success) { 
            $this->logger->info($user->user_id . ' ' . $username);
            $this->session->set('info', [
                'info' => 'warning',
                'msg'  => '登録に失敗しました'
            ]);
            $this->logger->error('会員登録失敗');
            return $this->dispatcher->forward([
                'controller' => 'register',
                'action'     => 'index'
            ]);
        }

        $this->session->set('user', [
            'id' => $users->id,
            'name' => $username,
        ]);

        $this->session->set('info', [
            'info' => 'success',
            'msg'  => '登録が完了しました',
        ]);

        return $this->dispatcher->forward([
            'controller' => 'index',
            'action'     => 'index'
        ]);

    }
}

