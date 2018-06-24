<?php

use Phalcon\Mvc\Controller;

class UsersController extends Controller
{   

    private function common() {
        $this->session->get("user");
        if (!$this->session->has("user")) {
            $response = new Phalcon\Http\Response();
            $response->redirect("/", false);
            $response->send();
            exit;
        }
    }
    
    public function indexAction() {
        
    }

    public function registerAction() {
        common();
        require_once "../register.php";

    }

    public function loginAction() {
        common();
        require_once "../login.php";
        
    }

    public function acountAction() {
        common();
        require_once "../acount.php";
    }

    public function shareAction() {
        common();
        require_once "../share.php";
    }

    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

