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
            $this->dispatcher->forward(array(
                'controller' => 'index',
                'action'     => 'index'
            ));
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
            $this->dispatcher->forward([
                'controller' => 'index',
                'action'     => 'index'
            ]);
            return;
        }
 
        //user success
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
        if (!$saveNewToken) {
            //save new token failed
            $this->failedLoginDanger();
            $this->dispatcher->forward([
                'controller' => 'login',
                'action'     => 'index'
            ]);
            return;
        }

        //save new token success
        $this->session->set('user', [
            'id' => $user->user_id,
            'name' => $user->user_name,
            'uuid' => $user->uuid,
            'token' => $token,
            'refresh_token' => $refresh_token
        ]);
        $this->session->set('info', [
            'info' => 'success',
            'msg'  => 'ログインしました',
            'setcookie' => false,
        ]);       
        $this->logger->info($user->user_id . ' ' . $user->user_name);
        $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
        $token = $this->cookies->get('ArroganciA_t')->getValue();
        $this->logger->debug('ろぐなうend'. $uuid . $token);
        $this->dispatcher->forward([
            'controller' => 'index',
            'action'     => 'index'
        ]);
        return;
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

}

