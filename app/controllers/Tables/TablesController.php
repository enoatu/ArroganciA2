<?php
namespace ArroganciA\Controller\Tables;
class TablesController extends \ArroganciA\Controller\ControllerBase {
    
    public function initialize() {
        $this->assets->addCss('css/index.css', true);
        $this->assets->addCss('css/table/index.css', true);
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', false);
       // $this->request->getPost($word, 'string');
    }

     protected function getDisplayTable($is_gl, $kind, $user_id,$concatedWords) {
        $model = new \ArroganciA\Model\PhqlExcuter();
        $str = ($is_gl) ? 'gl': 'lo';
        //search
        $words = explode(' ', $concatedWords);
        return $model->sqlExecute($str . '_' . $kind, $user_id, $words);
    }

    protected function getTableName($param) {
        // table/index/appのindexやappを取り出す
        $tableName = $this->dispatcher->getParam($param);
        $tableName = $this->cutSlash($tableName);
        return $tableName;
    }

    private function cutSlash(string $str = null) {
        return substr($str, 1, strlen($str) - 1);
    }

    protected function cutPlus($str) {
        return str_replace('+', ' ', $str);
    }

    protected function getPlus($str) {
        return str_replace(' ', '+', $str);
    }

    protected function getMapTable($systemName) {
        switch($systemName) {
        case 'app'     : return 'アプリ';
        case 'site'    : return 'ウェブサイト';
        case 'service' : return 'サービス';
        case 'system'  : return 'システム';
        case 'game'    : return 'ゲーム';
        default : return;
        }
    }
}

