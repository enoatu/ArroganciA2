<?php
use ArroganciA\Controller\Tables\TablesController;
class LocalController extends TablesController {
    public function indexAction() {
        $kind          = $this->getTableName('kind');
        $user_id       = $this->session->get('user')['id'];
        $concatedWords = $this->request->getPost('words', 'string') ?? $this->dispatcher->getParam('search');
        $displayTweets = $this->getDisplayTable(false, $kind, $user_id,$concatedWords);
        if (!$displayTweets) return $this->redirect('index','show404');

        $currentPage = $this->dispatcher->getParam('page') ?? 1;
        $paginator = new Phalcon\Paginator\Adapter\Model([
            'data' => $displayTweets,
            'limit' => 15,
            'page' => $currentPage
        ]);

        $this->view->setVar('toLocalorGlobal', 'global');
        $this->view->setVar('toReLocalorGlobal', 'global');
        $this->view->setVar('reverseTitle', 'グローバルテーブルへ');
        $this->view->setVar('postedWords', $concatedWords);
        $this->view->setVar('title', $this->getMapTable($kind) . 'のローカルテーブル');
        $this->view->setVar('page', $paginator->getPaginate());
        $this->view->setVar('kind', $kind);
        $this->assets->addJs('js/checkAction.js', true);
    }
}
