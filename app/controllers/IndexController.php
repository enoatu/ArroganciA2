<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{   
    public function initialize() {
        $this->view->title = "Home";
        $this->assets->addCss('css/index.css');
    }
    public function indexAction() {
    }

    public function registerAction() {
        $url     = md5(uniqid(rand(), 1));
        $text    = new Texts();
        $success = $text->save(
            [
               'text' => $this->request->getPost('text'),
                'url' => $url
            ]
        );

        if ($success) {
            #$this->view->disable();
            $response = new Phalcon\Http\Response();
            $response->redirect("result/$url", false);
            $response->send();
            exit;

        } else {
            echo 'Sorry, the following problems were generated: ';
            $messages = $text->getMessages();
            foreach ($messages as $ms) {
                echo $ms->getMessages(), '<br/>';
            }
       }

       $this->view->disable();
    }

    public function show404Action() {
         echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

