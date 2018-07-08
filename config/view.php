<?php
use Phalcon\Mvc\View;

$di->set(
    'view',
    function(){
        $view =new View();
        $view ->setViewsDir([
            '../app/views/',
            '../app/views/member/',
            '../app/views/supports/'
        ]);
        $view->registerEngines([
            '.volt' => function ($view, $di){
                $volt = new Phalcon\Mvc\View\Engine\Volt($view, $di);
                $volt->setOptions([
                    'compiledPath'      => '../cache/',
                    'compiledSeparator' => '#',
                    //'compiledAlways'    => true
                ]);
                $volt->getCompiler()->addFunction('number_format','number_format');
                return $volt;
            },
          
            ".phtml" => 'Phalcon\Mvc\View\Engine\Volt'
        ]);
        return $view;
    }
);

