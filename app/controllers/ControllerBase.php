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
        session_save_path("/tmp");
        ini_set('session.gc_maxlifetime', 1800);
        ini_set('session.gc_probability', 1);
        ini_set('session.gc_divisor', 100);
        //新規で入ってきた時
        if (!isset($this->session->get('user')['id'])) {
            $this->session->set('user', [
                'id'   => '32',
                'name' => 'ゲストユーザー',
            ]);
            $this->logger->notice('新規orゲストログイン');
            return;
        }
        //ゲストで入った時
        //if ($this->session->get('user')['id'] == '32') {
        //    //認証不要
        //    $this->session->set('user', [
        //        'id'   => '32',
        //        'name' => 'ゲストユーザー',
        //    ]);
        //    $this->logger->notice('ゲストでログイン');
        //    return;
        //}
    }

    public function redirect($contoller, $action) {
        return $this->dispatcher->forward([
            'controller' => $contoller,
            'action' => $action,
        ]);
    }
}
