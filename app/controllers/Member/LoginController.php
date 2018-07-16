<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class LoginController extends ControllerBase {
    public function initialize() {
    }

    public function indexAction() {
        $this->view->setVar("title", "ログイン");
        if ($this->session->get('info')['info']) {
            $this->view->setVar('info', $this->session->get('info')['info']);
            $this->view->setVar('msg', $this->session->get('info')['msg']);
            $this->session->remove('info');
        }

        $this->assets->addJs('js/info.js');
        $this->assets->addCss('css/index.css', true);
        $this->assets->addCss('css/table/index.css', true);
    }

    public function loginAction() {
        $response  = new Phalcon\Http\Response();
        if(!$this->request->isPost()) {
            $response->redirect("login/index", false);
            $response->send();
            exit;
        }
        $nameOrMail = $this->request->getPost("nameOrMail",'string');
        $password   = $this->request->getPost("password", 'string');
        $response  = new Phalcon\Http\Response();
        //find user
        $user = $this->findUser($nameOrMail);
        $this->logger->info("pass " . $password);
        $this->logger->info("modelpass " . $user->user_pass);
        //check find user
        if ($user && $this->security->checkHash($password, $user->user_pass)) {
            //find user success
            $random        = new Random();
            $token         = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $refresh_token = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $token_expiry  = time() + (1 * 24 * 60 * 60);
            //save new token
            $saveNewToken = $user->save([
                'token'         => $token,
                'token_expiry'  => $token_expiry,
                'refresh_token' => $refresh_token,
            ]);
            //check save new token
            if ($saveNewToken) {
                //save new token success
                $this->session->set('user', [
                    'id' => $user->user_id,
                    'name' => $user->user_name,
                ]);
                $this->session->set('info', [
                    'info' => 'success',
                    'msg'  => 'ログインしました'
                ]);
                //set new cookie
                $this->_setCookie($user->uuid, $token, $refresh_token);
                $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
                $token = $this->cookies->get('ArroganciA_t')->getValue();
                $this->logger->debug('ろぐなう'. $uuid . $token);
                $this->logger->info($user->user_id . ' ' . $user->user_name);
                $response->redirect("index/index", false);
            } else {  
                //save new token failed
                $this->failedLoginDanger();
                $response->redirect("login/index", false);
            }
        } else {
            //find user failed
            $this->failedLogin();
            $response->redirect("login/index", false);
        }
        $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
        $token = $this->cookies->get('ArroganciA_t')->getValue();
        $this->logger->debug('ろぐなうend'. $uuid . $token);

        $response->send();
        exit;
    }

    private function findUser($nom) {
        $user  = Users::findFirstByUser_name($nom);
        if ($user) return $user;
        $user = Users::findFirstByUser_email($nom);
        return $user;
    }

    private function failedLoginDanger() {
        $this->session->set('info', [
            'info' => 'danger',
            'msg'  => 'ログインに失敗しました'
        ]);
        $this->logger->error('ログイン失敗danger');
    }

    private function failedLogin() {
        $this->session->set('info', [
            'info' => 'warning',
            'msg'  => '入力されたユーザー名やパスワードが正しくありません。確認してからやりなおしてください。'
        ]);
        $this->logger->error('ログイン失敗');
    }

    private function failedSetCookie() {
        $this->session->set('info', [
            'info' => 'warning',
            'msg'  => 'Cookieを有効にしてください。',
        ]);
        $this->session->remove('user');
        $this->logger->error('クッキーセット失敗');
        $response      = new Phalcon\Http\Response();
        $response->redirect('login/index', false);
        $response->send();
        exit;
    }

    private function _setCookie($uuid, $token, $refresh_token) {
        $this->logger->debug('setcookie ' . $uuid);
        setcookie(
            'ArroganciA_u',
            $uuid,
            time() + (365 * 24 * 60 * 60),
            '/',
            $this->url->get()
        );
        setcookie(
            'ArroganciA_t',
            $token,
            time() + (365 * 24 * 60 * 60), 
            '/',
            $this->url->get()
        );
        setcookie(
            'ArroganciA_r_t',
            $refresh_token,
            time() + (365 * 24 * 60 * 60),
            '/',
            $this->url->get()
        );
       // $this->logger->debug('seteedcookie ' . $uuid);
        //$uuid  = $this->cookies->get('ArroganciA_u')->getValue();
       // $token = $this->cookies->get('ArroganciA_t')->getValue();
       // $this->logger->debug('セットされた?'. $uuid . $token);
    }
}

