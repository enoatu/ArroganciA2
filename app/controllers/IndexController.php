<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{


    public function indexAction(){
        $this->assets->addCss(
            '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css',
            false
        ); 
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

       $this->view->disable();
            #echo 'Thanks for registering';
       $response = new Phalcon\Http\Response();
       $response->redirect("http://enoatu.com/nopaste/$uri", false);
       $response->send();

        } else {
            echo 'Sorry, the following problems were generated: ';

            $messages = $text->getMessages();

            foreach ($messages as $ms) {
                echo $ms->getMessages(), '<br/>';
            }
        
       }

       $this->view->disable();

    }

    public function resultAction() {
        $text = new Texts();
        echo $_SERVER["REQUEST_URI"];
        #$success = $text->find(
        #    "url" => $
        #)

        $this->view->disable();
         
    }

    public function show404Action(){
        echo "<h2>Sorry! $_SERVER[REQUEST_URI] is expired or not exist! </h2>";
    }
}
