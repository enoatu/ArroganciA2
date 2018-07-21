<?php
use ArroganciA\Controller\ControllerBase;

class TablesController extends ControllerBase {

    public function initialize() {
        $this->assets->addCss('css/index.css', true);
        $this->assets->addCss('css/table/index.css', true);
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', false);
    }

    public function indexAction() {
        $user_id = $this->session->get('user')['id'];
        $model = new \ArroganciA\Model\PhqlExcuter();
        $data  = '';
        switch ($this->getTableName('kind')) {
        case 'app':
            $data = $model->sqlExecute('gl_app', $user_id);break;
        case 'site':
            $data = $model->sqlExecute('gl_site', $user_id);break;
        case 'system':
            $data = $model->sqlExecute('gl_system', $user_id);break;
        case 'game':
            $data = $model->sqlExecute('gl_game', $user_id);break;
        case 'service':
            $data = $model->sqlExecute('gl_service', $user_id);break;
        default:
            return $this->dispatcher->forward([
                'controller' => 'index',
                'action'     => 'index'
            ]);
        }
        if (isset($_GET['page'])) {
            $currentPage = (int) $_GET['page'];
        } else { 
            $currentPage = 1;
        }
        $paginator = new Phalcon\Paginator\Adapter\Model([
            'data' => $data,
            'limit' => 30,
            'page' => $currentPage
        ]);

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
        $this->assets->addJs('js/checkAction.js', true);

        $user_id = $this->session->get('user')['id'];
        $model = new \ArroganciA\Model\PhqlExcuter();
        $data  = '';
        switch ($this->getTableName('kind')) {
        case 'app':
            $data = $model->sqlExecute('lo_app', $user_id);break;
        case 'site':
            $data = $model->sqlExecute('lo_site', $user_id);break;
        case 'system':
            $data = $model->sqlExecute('lo_system', $user_id);break;
        case 'game':
            $data = $model->sqlExecute('lo_game', $user_id);break;
        case 'service':
            $data = $model->sqlExecute('lo_service', $user_id);break;
        default:
            return $this->dispatcher->forward([
                'controller' => 'index',
                'action'     => 'index'
            ]);          
        }
        if (isset($_GET['page'])) {
            $currentPage = (int) $_GET['page'];
        } else { 
            $currentPage = 1;
        }
        $paginator = new Phalcon\Paginator\Adapter\Model([
            'data' => $data,
            'limit' => 30,
            'page' => $currentPage
        ]);
        $page = $paginator->getPaginate();
        $this->view->setVar('page', $page);
        $this->view->setVar('kind', $this->getTableName('kind'));
        $this->view->setVar('title', 'のローカルテーブル');
    }

    private function getTableName(string $parameter) {
        $tableName = $this->dispatcher->getParam($parameter);
        $tableName = $this->cutSlash($tableName);
        return $tableName;
    }

    private function cutSlash(string $str = null) {
        return substr($str, 1, strlen($str) - 1);
    }
}

