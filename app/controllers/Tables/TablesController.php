<?php
use ArroganciA\Controller\ControllerBase;

class TablesController extends ControllerBase {

    public function initialize() {
        $this->assets->addCss('css/index.css', true);
        $this->assets->addCss('css/table/index.css', true);
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', false);
    }

    public function indexAction() {
        $model = new \ArroganciA\Model\PhqlExcuter();
        $data  = '';
        switch ($this->getTableName('kind')) {
        case 'app':
            $data = $model->sqlExecute('gl_app');break;
        case 'site':
            $data = $model->sqlExecute('gl_site');break;
        case 'system':
            $data = $model->sqlExecute('gl_system');break;
        case 'game':
            $data = $model->sqlExecute('gl_game');break;
        case 'service':
            $data = $model->sqlExecute('gl_service');break;
        default:
            $response = new Phalcon\Http\Response();
            $response->redirect('', false);
            $response->send();
            exit;
        }

        $currentPage = (int) $_GET['page'];
        $paginator = new Phalcon\Paginator\Adapter\Model(array(
            'data' => $data,
            'limit' => 30,
            'page' => $currentPage
        ));

        $page = $paginator->getPaginate();
        $this->view->setVar('page', $page);
        $this->view->setVar('kind', $this->getTableName('kind'));
        $this->view->setVar('title', 'のグローバルテーブル');
        //global.volt
        $this->view->setVar('global', 'global');
        $this->view->setVar('user_id', $this->session->get('user')['id']);
        //
    }
   
    public function localAction() {
        $model = new \ArroganciA\Model\PhqlExcuter();
        $data  = '';
        switch ($this->getTableName('kind')) {
        case 'app':
            $data = $model->sqlExecute('lo_app');break;
        case 'site':
            $data = $model->sqlExecute('lo_site');break;
        case 'system':
            $data = $model->sqlExecute('lo_system');break;
        case 'game':
            $data = $model->sqlExecute('lo_game');break;
        case 'service':
            $data = $model->sqlExecute('lo_service');break;
        default:
            $response = new Phalcon\Http\Response();
            $response->redirect('', false);
            $response->send();
            exit;
        }
        $currentPage = (int) $_GET['page'];
        $paginator = new Phalcon\Paginator\Adapter\Model(array(
            'data' => $data,
            'limit' => 30,
            'page' => $currentPage
        ));

        $page = $paginator->getPaginate();
        $this->view->setVar('page', $page);
        $this->view->setVar('kind', $this->getTableName('kind'));
        $this->view->setVar('title', 'のローカルテーブル');
        $this->view->setVar('local', 'local');
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

