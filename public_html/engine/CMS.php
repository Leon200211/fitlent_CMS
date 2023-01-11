<?php


namespace engine;

use engine\core\router\DispatchedRoute;
use engine\helper\Common;

// основной класс нашей CMS системы, который запускает всю логику работы
class CMS
{
    private $di;

    public $db;

    public $router;

    public function __construct($di){

        $this->di = $di;
        $this->router = $this->di->get('router');

    }


    // метод запуска всей CMS
    public function run(){

        try{

            if(ENV !== 'cms'){
                require_once ROOT_DIR . '/../' . ENV . '/routes.php';
            }else{
                require_once ROOT_DIR . '/' . ENV . '/routes.php';
            }



            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());


            // если не существует данного роута
            if($routerDispatch === NULL){
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            $controller = '\\' . ENV . '\\controllers\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);

        }catch (\Exception $e){

            echo $e->getMessage();
            exit;

        }



    }

}