<?php
use ArroganciA\Controller\ControllerBase;
class ConfigController extends ControllerBase
{
    public function indexAction() {
        $this->view->title = "設定";
        $this->assets->addCss('css/index.css');
    }

    public function registerAction(){
        $nameOrMail = $this->request->getPost("kindofdisp",'string');
        
        $this->session->set('disp', [
            'sender' => 'true',
            'date' => 'true',
        ]);

        $this->session->set('info', [
            'info' => 'success',
            'msg'  => '設定しました',
        ]); 
        return $this->redirect('index', 'index');
    }   
}
