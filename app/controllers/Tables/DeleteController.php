<?php
use ArroganciA\Controller\Tables\TablesController;
use \ArroganciA\Model\Iine;
class DeleteController extends TablesController {
    public function indexAction() {
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
}
