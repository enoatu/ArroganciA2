<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class RegisterController extends ControllerBase {
    public function initialize(){
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
            $response            = new Phalcon\Http\Response();
        if(!$this->request->isPost()) {
            $this->logger->warn('postされませんでした');
            $response->redirect('register/index', false);
            $response->send();
            exit;
        }
        try{
            $user                = new Users;
            $username            = $this->request->getPost('username', 'string');
            $user->user_name     = $username;
            $user->user_email    = $this->request->getPost('email', 'email');
            $password            = $this->request->getPost('password');
            $user->user_pass     = $this->security->hash($password);
            $random              = new Random;
            $uuid =  $user->uuid = $random->uuid();// db082997-2572-4e2c-a046-5eefe97b1235
            $token =  $user->token = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $refresh_token = $user->refresh_token = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $user->token_expiry  = time() + (1 * 24 * 60 * 60);
            $success             = $user->save();
            if ($success) {
                $this->session->set('user', [
                    'id' => $users->id,
                    'name' => $username,
                ]);
                $this->session->set('info', [
                    'info' => 'success',
                    'msg'  => '登録が完了しました'
                ]);
                $this->setCookie($uuid, $token, $refresh_token);
                $this->logger->info($users->user_id . ' ' . $username);
                $response->redirect('index/index', false);
            } else {
                $this->session->set('info', [
                    'info' => 'warning',
                    'msg'  => '登録に失敗しました'
                ]);
                $this->logger->error('会員登録失敗');
                $response->redirect('register/index', false);
            }
            $response->send();
            exit;
        } catch(Exception $e) {
            $this->logger->error('会員登録失敗catch');
            $this->session->set('info', [
                'info' => 'danger',
                'msg'  => '登録に失敗しました'
            ]);
            $e->getMessage();
        }
            //$this->view->disable();
    }

    private function setCookie($uuid, $token, $refresh_token){
        $this->cookies->set(
            'ArroganciA_u',
            $uuid,
            time() + (365 * 24 * 60 * 60)
        );
        $this->cookies->set(
            'ArroganciA_t',
            $token,
            time() + (365 * 24 * 60 * 60)
        );
        $this->cookies->set(
            'ArroganciA_r_t',
            $refresh_token,
            time() + (365 * 24 * 60 * 60)
        );
    }
}

