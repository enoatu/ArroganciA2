<?php
use ArroganciA\Controller\ControllerBase;
use ArroganciA\Model\Iine;

class TablesController extends ControllerBase {

    public function initialize() {
        $this->assets->addCss('css/index.css', true);
        $this->assets->addCss('css/table/index.css', true);
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', false);
    }

    public function indexAction() {
        $kind = $this->getTableName('kind');
        $user_id = $this->session->get('user')['id'];
        $data = $this->getDisplayTable(true, $kind, $user_id);
        if (!$data) return $this->redirect('index','show404');
        $currentPage = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        var_dump($data);
        $paginator = new Phalcon\Paginator\Adapter\Model([
            'data'  => $data,
            'limit' => 30,
            'page'  => $currentPage
        ]);
        $this->view->setVar('page', $paginator->getPaginate());
        $this->view->setVar('kind', $kind);
        $this->view->setVar('title', 'のグローバルテーブル');
        //global.volt
        $this->view->setVar('global', 'global');
        $this->view->setVar('user_id', $this->session->get('user')['id']);
    }
   
    public function localAction() {
        $kind = $this->getTableName('kind');
        $this->assets->addJs('js/checkAction.js', true);
        $user_id = $this->session->get('user')['id'];
        $data = $this->getDisplayTable(false, $kind, $user_id);
        //if (!$data) return $this->redirect('index','show404');
        $currentPage = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $paginator = new Phalcon\Paginator\Adapter\Model([
            'data' => $data,
            'limit' => 15,
            'page' => $currentPage
        ]);
        $this->view->setVar('page', $paginator->getPaginate());
        $this->view->setVar('kind', $kind);
        $this->view->setVar('title', 'のローカルテーブル');
    }

    public function deleteAction() {
        if (!$this->request->isPost()) return $this->postError($kind);
        $user_id   = $this->session->get('user')['id'];
        $tweet_ids = $this->request->getPost('check', 'int');
        $kind      = $this->getTableName('kind');
        if (!isset($user_id, $tweet_ids, $kind)) return $this->postError($kind, '取得エラー');
        //check
        $iines   = [];
        $iineObj = $this->getIineTable($kind);
        if (!$iineObj) return $this->postError($kind, 'iineObj取得エラー');
        foreach ($tweet_ids as $tweet_id) {
            $iine = $iineObj::find([
                    "user_id = :id: AND tweet_id = ?1",
                    "bind" => [
                        "id" => $user_id,
                        1    => $tweet_id,
                    ],
                ]);
            if (!$iine) return $this->postError($kind);
            array_push($iines, $iine);
        }
        foreach ($iines as $target) {
            $result = $target->delete();
            if(!$result) return $this->postError($kind);
        }
        $this->session->set('info', [
            'info' => 'info',
            'msg'  => '削除しました',
        ]);
        return $this->redirect('tables', 'local', $kind);
    }

    private function getIineTable($kind) {
        $this->logger->info("getiine kind" . $kind);
        switch ($kind) {
        case 'app'     : return new Iine\app_iine(); break;
        case 'site'    : return new Iine\site_iine();   break;
        case 'service' : return new Iine\service_iine();break;
        case 'system'  : return new Iine\system_iine(); break;
        case 'game'    : return new Iine\game_iine();   break;
        default : return;
        }
    }

    private function postError($kind, $str = null) {
        if (!isset($str)) {
            $this->logger->error('postエラー');
        } else {
            $this->logger->error($str);
        }
        $this->session->set('info', [
            'info' => 'warning',
            'msg'  => '削除に失敗しました',
        ]); 
        return $this->redirect('tables', 'local', $kind);
    }

    private function getDisplayTable($is_gl, $kind, $user_id) {
        $model = new \ArroganciA\Model\PhqlExcuter();
        $str = ($is_gl) ? 'gl': 'lo';
        return $model->sqlExecute($str . '_' . $kind, $user_id);
    }

    private function getTableName($param) {
        // table/index/appのindexやappを取り出す
        $tableName = $this->dispatcher->getParam($param);
        $tableName = $this->cutSlash($tableName);
        return $tableName;
    }

    private function cutSlash(string $str = null) {
        return substr($str, 1, strlen($str) - 1);
    }
}

