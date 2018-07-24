<?php
use ArroganciA\Controller\Tables\TablesController;
use \ArroganciA\Model\Iine;
class GlobalController extends TablesController {
    public function indexAction() {
        $kind = $this->getTableName('kind');
        $user_id = $this->session->get('user')['id'];
        $data = $this->getDisplayTable(true, $kind, $user_id);
        if (!$data) return $this->redirect('index','show404');
        $currentPage = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $paginator = new Phalcon\Paginator\Adapter\Model([
            'data'  => $data,
            'limit' => 30,
            'page'  => $currentPage
        ]);
        $this->view->setVar('page', $paginator->getPaginate());
        $this->view->setVar('toLocalorGlobal', 'local');
        $this->view->setVar('reverseTitle', 'ローカルテーブルへ');
        $this->view->setVar('title', $this->getMapTable($kind) . 'のグローバルテーブル');
        //global.volt
        $this->view->setVar('kind', $kind);
        $this->view->setVar('global', 'global');
        $this->view->setVar('user_id', $this->session->get('user')['id']);
    }
}

