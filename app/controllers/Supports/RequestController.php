<?php
use ArroganciA\Controller\ControllerBase;

class RequestController extends ControllerBase {

    public function indexAction() {
        $this->view->title = "要望・リクエスト";
        $this->assets->addCss('css/index.css');
    }
    public function registerAction() {
        if (!$this->request->isPost()) return $this->postError();
        $name =  $this->request->getPost('username', 'string');
        $email = $this->request->getPost('email', 'email');
        $request = $this->request->getPost('request', 'string');    
        $message = 
            $email."というメールアドレスの"
            .$name."さんから、「".$request."」";
        $header = 'From: ArroganciA@enoatu.com';
        $isSuccess = mb_send_mail(
            "enotiru1221@gmail.com",
            "ArroganciAのご要望",
            $message,
            $header,
            '-f ' . 'enotiru@enoatu.com'
        );
        if (!$isSuccess) return $postError('メール送信に失敗');
        return $this->postSuccess();
    }
    private function postSuccess() {
        $this->session->set('info', [
            'info' => 'success',
            'msg'  => 'リクエストを送信しました。ご協力ありがとうございます',
        ]); 
        return $this->redirect('index', 'index');
    }

    private function postError($str = null) {
        if (!isset($str)) {
            $this->logger->error('postエラー');
        } else {
            $this->logger->error($str);
        }
        $this->session->set('info', [
            'info' => 'error',
            'msg'  => 'メール送信に失敗しました',
        ]); 
        return $this->redirect('request', 'index');
    }

}

