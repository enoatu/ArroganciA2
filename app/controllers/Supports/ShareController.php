<?php
use ArroganciA\Controller\ControllerBase;
class ShareController extends ControllerBase
{
    public function indexAction() {
        $this->view->title = "シェアしよう（棒読み）";
        $this->assets->addCss('css/index.css');
    }
}

