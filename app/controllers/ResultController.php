<?php

use Phalcon\Mvc\Controller;

class ResultController extends Controller
{
    public function indexAction() {
        $this->assets->addCss(
            '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css',
            false
        );
        $this->assets->addCss('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css'
            ,false);
        $this->assets->addJs('http://code.jquery.com/jquery-latest.min.js',false);
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js',false);
        $this->assets->addJs('js/result.js');
        $text = new Texts();
        $url = $_SERVER["REQUEST_URI"];
        try {
            $mText = $text->find(
                [
                    "url" => $url
                ]
            );

            if ($mText){
                foreach ($mText as $t) {
                    $this->view->text = $t;
                }
            } else {
                $this->view->text = "I'm sorry! url is expired or not exists";
            }

        } catch (\Exception $e) {
            echo $e;
        }
        
        $this->view->uri = $request_uri;

        #$this->view->disable();
    }

    public function resultAction() {
        
    }

}
