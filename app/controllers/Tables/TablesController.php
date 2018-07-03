<?php
use Phalcon\Mvc\Controller;
use ArroganciA\Model\Tweet as Tweet;

class TablesController extends Controller {   
    public function initialize() {
        $this->assets->addCss('css/index.css', true);
        $this->assets->addJs("https://unpkg.com/react@0.13.3/dist/react.js", false);
        $this->assets->addJs("https://unpkg.com/react@0.13.3/dist/JSXTransformer.js", false);
        $this->assets->addJs("js/reactSample.js", true);
    }
    public function indexAction() {
        $model = new Tweet\app_tb2();
        $data          = '';
        switch ($this->getTableName('kind')) {
        case 'app':
            $data = $model->sqlExecute('gl_app');break;
        case 'site':
            $data = $model->sqlExecut('gl_site');break;
        case 'system':
            $data = $model->sqlExecute('gl_system');break;
        case 'game':
            $data = $model->sqlExecute('gl_game');break;
        case 'service':
            $data = $model->sqlExecute('gl_service');break;
        default:
            $response = new Phalcon\Http\Response();
            $response->redirect("", false);
            $response->send();
            exit;break;
        }
        foreach($data as $datum){
            var_dump($datum);
        }

       // var_dump($data);
        //alt globalAction
        exit;
        $this->view->title = "グローバルテーブル";
    }
   
    public function localAction() {
        $this->view->title = "ローカルテーブル";
    }

      private function getTableName(string $parameter) {
        $tableName = $this->dispatcher->getParam($parameter);
        var_dump($tableName);
        $tableName = $this->cutSlash($tableName);
        return $tableName;
    }

    private function cutSlash(string $str = null) {
        return substr($str, 1, strlen($str) - 1);
    }
}

