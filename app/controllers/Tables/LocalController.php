<?php
use ArroganciA\Controller\Tables\TablesController;
class LocalController extends TablesController {
    public function indexAction() {
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
        $this->view->setVar('toLocalorGlobal', 'global');
        $this->view->setVar('reverseTitle', 'グローバルテーブルへ');
        $this->view->setVar('title', $this->getMapTable($kind) . 'のローカルテーブル');
        $this->view->setVar('page', $paginator->getPaginate());
        $this->view->setVar('kind', $kind);
    }
}
