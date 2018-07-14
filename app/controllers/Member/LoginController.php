<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class LoginController extends ControllerBase {
    public function initialize() {
    }

    public function indexAction() {
        $this->view->setVar("title", "ログイン");
        $this->assets->addCss('css/index.css');
        if ($this->session->has('info')) {
            if ($this->session->get('info')['info']) {
                $this->view->setVar('info', $this->session->get('info')['info']);
                $this->view->setVar('msg', $this->session->get('info')['msg']);
                $this->session->remove('info');
            }
        }
        $this->assets->addJs('js/info.js');
    }

    public function loginAction() {
        $response  = new Phalcon\Http\Response();
        if(!$this->request->isPost()) {
            $response->redirect("login/index", false);
            exit;
        }
        $nameOrMail = $this->request->getPost("nameOrMail",'string');
        $password   = $this->request->getPost("password", 'string');
        $response  = new Phalcon\Http\Response();
        $user = $this->findUser($nameOrMail);
        $this->logger->info("pass " . $password);
        $this->logger->info("modelpass " . $user->user_pass);
        if ($user && $this->security->checkHash($password, $user->user_pass)) {
            $random        = new Random();
            $token         = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $refresh_token = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $token_expiry  = time() + (1 * 24 * 60 * 60);
            $regNewToken = $user->save([
                'token'                => $token,
                'token_expiry'         => $token_expiry,
                'refresh_token'        => $refresh_token,
            ]);
            if ($regNewToken) {
                $this->session->set('user', [
                    'id' => $user->user_id,
                    'name' => $user->user_name,
                ]);
                $this->session->set('info', [
                    'info' => 'success',
                    'msg'  => 'ログインしました'
                ]);
                $this->setCookie($user->uuid, $token, $refresh_token);
                $this->logger->info($user->user_id . ' ' . $user->user_name);
                $response->redirect("index/index", false);
            } else {  
                $this->failedLoginDanger();
                $response->redirect("login/index", false);
            }
        } else {
            $this->failedLogin();
            $response->redirect("login/index", false);
        }
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

    private function setCookie($uuid, $token, $refresh_token) {
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

