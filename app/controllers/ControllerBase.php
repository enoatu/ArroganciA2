<?php
namespace ArroganciA\Controller;
class ControllerBase extends \Phalcon\Mvc\Controller {

    public function beforeExecuteRoute($dispatcher) {
        $this->assets->addJs('js/info.js');
        if ($this->session->get('info')['info']) {
            $this->view->setVar('info', $this->session->get('info')['info']);
            $this->view->setVar('msg', $this->session->get('info')['msg']);
            $this->session->remove('info');
        }
    }

    public function afterExecuteRoute($dispatcher)
    {
        if ($dispatcher->getControllerName() == 'index') return;
        if (!isset($this->session->get('user')['id'])) {
            $this->dispatcher->forward(array(
                'controller' => 'index',
                'action'     => 'index'
            ));
            return false;
        }
    }
    public function authenticate() {   
       
       //cookieをセットするか判定 ログイン
        if (!$this->session->get('info')['setcookie']) {
            $this->_setCookie(
                $this->session->get('user')['uuid'],
                $this->session->get('user')['token'],
                $this->session->get('user')['refresh_token']
            );
        }
        //新規で入ってきた時
        if (!$this->cookies->has('ArroganciA_u')
            || !$this->cookies->has('ArroganciA_t')
            || !isset($this->session->get('user')['uuid'])
        ) {
            $this->session->set('user', [
                'id'   => 'guest',
                'name' => 'guest',
                'uuid' => 'guest',
            ]);
            $this->_setCookie('guest','guest','guest');
            $this->logger->notice('新規ログイン');
            return;
        }
        //ゲストで入った時
        if ($this->cookies->get('ArroganciA_u')->getValue() == 'guest'
            || $this->session->get('user')['uuid'] == 'guest'
        ) {
            //認証不要
             $this->session->set('user', [
                'id'   => 'guest',
                'name' => 'guest',
                'uuid' => 'guest',
            ]);
            $this->logger->notice('ゲストでログイン');
             return;
        }

        //以下は非ゲストユーザー処理

        $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
        $token = $this->cookies->get('ArroganciA_t')->getValue();
        $this->logger->debug('now cookie'. $uuid . $token);
        $user = \Users::findFirstByUuid($uuid);
        if (!$user) {
            $this->logger->debug('user not found ');
            return; 
        }
        
        $this->logger->debug('クッキー確認');
        // Get the cookie
        $this->logger->debug('now user '. $user->user_name);

        if ($token != $user->token) {
            //トークンが等しいか
            $this->logger->warning('トークンが合いません' . $token . ' != ' . $user->token);
            $this->updateExpire($token, $user, $this->cookies->get('ArroganciA_r_t')->getValue());
            $this->dispatcher->forward(array(
                'controller' => 'index',
                'action'     => 'index'
            ));
            return;
        }
        $this->logger->debug(date('Y/m/d') . '>?'. $user->token_expiry);

        if (date('Y/m/d') > $user->token_expiry) {
            $this->logger->debug('トークン期限確認');
            //期限切れかチェック
            $this->updateExpire($token, $user, $this->cookies->get('ArroganciA_r_t')->getValue());
        }
        //セッションをセット
    }

    public function updateExpire($token, $user, $refresh_token) {
        if ($user->refresh_token != $refresh_token ) {
            $this->_setCookie('guest','guest','guest');
            $this->dispatcher->forward(array(
                'controller' => 'index',
                'action'     => 'index'
            ));
            $this->logger->warning('トークン更新' . $token . ' != ' . $user->token);
        }
        $random = new \Phalcon\Security\Random();
        $user->token = $random->hex(36); // 05475e8af4a34f8f743ab48761 
        $user->token_expiry = time() + (1 * 24 * 60 * 60);
        $user->save();
        $this->logger->debug('クッキー更新');
    }

    public function _setCookie($uuid, $token, $refresh_token){
        $this->cookies->set(
            'ArroganciA_u',
            $uuid,
            time() + (1 * 24 * 60 * 60)
        );
        $this->cookies->set(
            'ArroganciA_t',
            $token,
            time() + (1 * 24 * 60 * 60)
        );
        $this->cookies->set(
            'ArroganciA_r_t',
            $refresh_token,
            time() + (365 * 24 * 60 * 60)
        );
        $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
        $token = $this->cookies->get('ArroganciA_t')->getValue();
        $this->logger->debug('セットされた?'. $uuid . $token);
    }
}
