<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
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
       //$this->assets->addCss('css/index.css');
             $this->view->title = "Home";
    }


    public function registerAction() {
        $url     = md5(uniqid(rand(),1));
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

