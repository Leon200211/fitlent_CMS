<?php


namespace engine;

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

        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/user/12', 'ProductController:index');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

        var_dump($routerDispatch);

    }

}