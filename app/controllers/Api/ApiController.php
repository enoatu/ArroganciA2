<?php

use Phalcon\Mvc\Controller;
use ArroganciA\Model\Iine as iine;

class ApiController extends Controller
{   
    public function indexAction() {
        $this->view->disable();
    }
    public function registerAction() {
        $this->view->disable();
        if (!$this->request->isPost()) {
            exit;
        }
        try {
            $json_string = file_get_contents('php://input');
            $postedData = json_decode($json_string, true);
            var_dump($postedData);
            // if(!isset($iine)) echo json_encode($this->getJsonFail());// exit;
            $kind     = $postedData['kind'];
            $user_id  = $postedData['user_id'];
            $tweet_id = $postedData['tweet_id'];
            $iine     = $this->selectTable($kind);
            $success  = $iine->save(
                [
                    'user_id'  => $user_id,
                    'tweet_id' => $tweet_id,
                ]
            );
            if ($success) {
                echo json_encode($this->getJson());
            } else {
                echo json_encode($this->getJsonFail());
            }
        } catch (Exception $e){
           echo $e->getMessage();
        }
    }

    private function selectTable($kind) {
        $iine = null;
        switch ($kind) {
        case 'app' : $iine     = new iine\app_iine();break;
        case 'site': $iine     = new iine\site_iine();break;
        case 'service' : $iine = new iine\service_iine();break;
        case 'system' : $iine  = new iine\system_iine();break;
        case 'game' : $iine    = new iine\game_iine();break;
        }
        return $iine;
    }

    private function getJson() {
        return [
            'success'
        ];
    }

    private function getJsonFail() {
        return [
            'failed'
        ];
    }


}

