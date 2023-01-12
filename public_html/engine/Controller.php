<?php


namespace engine;

use \engine\DI\DI;

// класс от которого наследуются все контроллеры
abstract class Controller
{

    /**
     * @var \engine\DI\DI
     */
    protected $di;
    protected $db;
    protected $view;
    protected $config;
    protected $request;

    public function __construct(DI $di){
        $this->di = $di;
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
    }



}