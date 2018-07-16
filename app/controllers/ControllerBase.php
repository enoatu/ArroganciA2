<?php
namespace ArroganciA\Controller;

class ControllerBase extends \Phalcon\Mvc\Controller {

    public function baseInitialize() {
    }

    public function output($code, $content=array()) {
        //Header
        $this->response->setContentType('application/json')
            ->setStatusCode($code, null)
            ->sendHeaders();
        //Body
        $this->response->setJsonContent($content)
            ->send();   
    }

    public function authenticate() {
        
          $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
          $token = $this->cookies->get('ArroganciA_t')->getValue();

        $this->logger->debug('ろぐなうaat'. $uuid . $token);
        $this->logger->debug('認証');
        if ($this->cookies->has('ArroganciA_u')) {
            $this->logger->debug('クッキー確認');
            // Get the cookie
            $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
            $token = $this->cookies->get('ArroganciA_t')->getValue();
            $this->logger->debug('now cookie'. $uuid . $token);
            if ($uuid == 'guest') $this->logger->notice('ゲストでログイン'); return;
            $users = \Users::findFirst(
                [
                    'uuid  = :uuid:',
                    'bind'=> [
                        'uuid'  => $uuid,
                    ]
                ]
            );
            if ($token == $users->token) {
                $this->logger->debug('トークン確認');
                //トークンが等しいか
                $this->logger->debug(date('Y/m/d') . '>?'. $users->token_expiry);
                if (date('Y/m/d') > $users->token_expiry) {
                    $this->logger->debug('トークン期限確認');
                    //期限切れかチェック
                    $this->updateExpire($users);
                }
            } else {
                $this->logger->warning(
                    'トークンが合いません' . $token . ' != ' . $users->token
                );
            }
        } else {
            $this->logger->debug('クッキーもってない');
            setcookie(
                'ArroganciA_u',
                'guest',
                time() + (365 * 24 * 60 * 60),
                '/',
                $this->url->get()
            );
            setcookie(
                'ArroganciA_t',
                'guest',
                time() + (365 * 24 * 60 * 60),
                '/',
                $this->url->get()
            );
            setcookie(
                'ArroganciA_r_t',
                'guest',
                time() + (365 * 24 * 60 * 60),
                '/',
                $this->url->get()
            );
            $uuid  = $this->cookies->get('ArroganciA_u')->getValue();
            $token = $this->cookies->get('ArroganciA_t')->getValue();
            $this->logger->debug('ろmot'. $uuid . $token);
        }
    }

    public function updateExpire($users) {
        $users->token = $random->hex(36); // 05475e8af4a34f8f743ab48761 
        $users->token_expiry = time() + (1 * 24 * 60 * 60);
        $users->save();
    }

    public function guestAction() {

    }

}
