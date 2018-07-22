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
        $this->logger->info('access');
        $tweet_id = $this->request->getPost('tweet_id', 'int');
        $kind     = $this->request->getPost('kind', 'string');
        $this->logger->info($kind . $tweet_id);
        $session_id = $this->session->getId($this->cookies->get('session_id'));
        $this->session->start();
        $user = Users::findFirstByUser_id($this->session->get('user')['id']);
        if (!$user) return json_encode($this->getJson('user not found'));
        $iine = $this->selectTable($kind);
        if (!$iine) return json_encode($this->getJson('iine not found'));
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
    }

    private function selectTable($kind) {
        $this->logger->info($kind);
        switch ($kind) {
        case 'app'     : return new iine\app_iine();break;
        case 'site'    : return new iine\site_iine();break;
        case 'service' : return new iine\service_iine();break;
        case 'system'  : return new iine\system_iine();break;
        case 'game'    : return new iine\game_iine();break;
        default : return;
        }
    }

    private function getJson($condition) {
        $this->logger->error($condition);
        return [
            $condition
        ];
    }
}

