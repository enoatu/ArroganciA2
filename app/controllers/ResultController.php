<?php

use Phalcon\Mvc\Controller;
require_once __dir__ . '/../../library/EditText.php';
class ResultController extends Controller
{
    public function indexAction() {

        include_once __dir__ . "/../../library/AddAssets.php";

        $url  = $_SERVER["REQUEST_URI"];
        $url  = EditText::getEndText($url, '/');
        $url  = "'" . $url . "'";#なんでこんなことしなきゃいけないん？？？
        try {
            $mText = Texts::findFirst("url = $url");
            if ($mText->text) {
                $this->view->maintext = $mText->text;
            } else {
                $this->view->maintext =
                    "# I'm sorry!
                    \n **URL is expired or does not exists**
                     ";
            }
        } catch (\Exception $e) {
            echo $e;
            $this->view->maintext = "catch";
        }
        
        $this->view->uri = $url;

        #$this->view->disable();
    }

    public function resultAction() {
        
    }
}
