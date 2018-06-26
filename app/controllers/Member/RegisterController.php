<?php

use Phalcon\Mvc\Controller;

class RegisterController extends Controller
{
    public function initialize(){
        $this->view->title = "会員登録";
        $this->assets->addCss('css/index.css');
    }

    public function indexAction() {
    }

    public function registerAction() {
        if(!$this->request->isPost()) {
            echo "exit";
            exit;
        }

        $username = $request->getPost("username");
        $email = $request->getPost("email");
        $password = $request->getPost("password");
        $success = $text->save(
            [
                'username' => $username,
                'email' => $email,
                'password' => $password
            ]
        );

        if ($success) {
            $this->view->success = true;
            $response = new Phalcon\Http\Response();
            $response->redirect("index/index", false);
            $response->send();
            exit;

        } else {
            echo 'Sorry, Error';      
        }

        $this->view->disable();
    }

        public function show404Action() {
            echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

