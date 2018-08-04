<?php
use ArroganciA\Controller\Tables\TablesController;
use ArroganciA\Model\Iine;
class GlobalController extends TablesController {
    public function indexAction() {
        $kind          = $this->getTableName('kind');//app
        $user_id       = $this->session->get('user')['id'];
        $concatedWords = $this->request->getPost('words', 'string') ?? $this->cutPlus($this->request->getQuery('search', 'string')); // ?search=android おもしろい
        $this->logger->info('post' . $this->request->getPost('words', 'string'));
        $this->logger->info('get' . $_GET['search']);
        $this->logger->info('get' . $this->request->getQuery('search', 'string'));
        $this->logger->info('concatedWords' . $concatedWords);
        $this->logger->info('con ' . $this->getPlus($concatedWords));
        $displayTweets = $this->getDisplayTable(true, $kind, $user_id, $concatedWords);
        if (!$displayTweets) return $this->redirect('index','show404');

        $currentPage = $this->request->getQuery('page', 'int') ?? 1;
        $paginator = new Phalcon\Paginator\Adapter\Model([
            'data'  => $displayTweets,
            'limit' => 30,
            'page'  => $currentPage
        ]);
        $this->view->setVar('page', $paginator->getPaginate());
        $this->view->setVar('toLocalorGlobal', 'global');
        $this->view->setVar('toReLocalorGlobal', 'local');
        $this->view->setVar('postedWords', $concatedWords);
        $this->view->setVar('postedWordsPlus', $this->getPlus($concatedWords));
        $this->view->setVar('reverseTitle', 'ローカルテーブルへ');
        $this->view->setVar('title', $this->getMapTable($kind) . 'のグローバルテーブル');
        //global.volt
        $this->view->setVar('kind', $kind);
        $this->view->setVar('global', 'global');
        $this->view->setVar('user_id', $this->session->get('user')['id']);
    }
}

