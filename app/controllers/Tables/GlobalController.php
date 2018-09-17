<?php
use ArroganciA\Controller\Tables\TablesController;
use ArroganciA\Model\Iine;
class GlobalController extends TablesController {
    public function indexAction() {
        $kind          = $this->getTableName('kind');//app
        $user_id       = $this->session->get('user')['id'];
        $concatedWords = $this->request->getPost('words', 'string') ?? $this->addPlus($this->request->getQuery('search', 'string'), 1); // ?search=android おもしろい
        $this->logger->info('post' . $this->request->getPost('words', 'string'));
        $this->logger->info('get' . $this->request->getQuery('search', 'string'));
        $this->logger->info('getPlus  ' . $this->addPlus($this->request->getQuery('search', 'string'),1));
        $this->logger->info('concatedWords ' . $concatedWords);
        $this->logger->info('postedWords ' . $this->cutPlus($concatedWords));
        $this->logger->info('postedWordsPlus ' . $this->addPlus($concatedWords,1));
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
        $this->view->setVar('postedWords', $this->cutPlus($concatedWords));
        $this->view->setVar('postedWordsPlus', $this->addPlus($concatedWords, 1));
        $this->view->setVar('reverseTitle', 'ローカルテーブルへ');
        $this->view->setVar('title', $this->getMapTable($kind) . 'のグローバルテーブル');
        //global.volt
        $this->view->setVar('kind', $kind);
        $this->view->setVar('global', 'global');
        $this->view->setVar('user_id', $this->session->get('user')['id']);
    }
}

