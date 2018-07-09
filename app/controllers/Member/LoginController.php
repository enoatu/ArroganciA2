<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{

    public function indexAction() {
        $this->view->title = 'ログイン'
    }

    public function loginAction() {
    

        $this->view->disable();
    }
    
    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

