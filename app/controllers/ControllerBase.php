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

    public function authenticate() {   

        //新規で入ってきた時
        if (!isset($this->session->get('user')['uuid'])) {
            $this->session->set('user', [
                'id'   => '32',
                'name' => 'ゲストユーザー',
            ]);
            $this->logger->notice('新規ログイン');
            return;
        }
        //ゲストで入った時
        if ( $this->session->get('user')['uuid'] == 'guest' ) {
            //認証不要
            $this->session->set('user', [
                'id'   => 'guest',
                'name' => 'guest',
            ]);
            $this->logger->notice('ゲストでログイン');
            return;
        }
    }

}
