<?php

use ArroganciA\Controller\ControllerBase;
use ArroganciA\Model\Iine as iine;

class ApiController extends ControllerBase
{   
    public function indexAction() {
        $this->view->disable();
    }
    public function registerAction() {
        if (!$this->request->isPost() || !$this->request->isAjax()) {
            $this->logger->error('not post');
            exit;
        }
        try {
            $this->logger->info('access');
           // var_dump($postedData);
            // if(!isset($iine)) echo json_encode($this->getJsonFail());// exit;
            $tweet_id = $this->request->getPost('tweet_id', 'string');
            $kind     = $this->request->getPost('kind', 'string');
            $uuid     = $this->cookies->get('ArroganciA_u');
            $this->logger->info($kind . $uuid . $tweet_id);
            $user = Users::findFirstByUuid($uuid);
            if (!$user) {
                return json_encode($this->getJson('user not found'));
            }
            $iine     = $this->selectTable($kind);
            if (!$iine) {
                return json_encode($this->getJson('iine not found'));
            }
            $this->logger->info($user->user_id . " " . $tweet_id);
            $success = $iine->save(
                [
                    'user_id'  => $user->user_id,
                    'tweet_id' => $tweet_id,
                ]
            );
            if ($success) {
                echo json_encode($this->getJson('success'));
            } else {
                echo json_encode($this->getJson('failed'));
            }
        } catch (Exception $e){
            echo $e->getMessage();
            exit;
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

    private function getJson($condition) {
        $this->logger->error($condition);
        return [
            $condition
        ];

    }


}

