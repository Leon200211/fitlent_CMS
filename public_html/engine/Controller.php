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
    protected $load;
    //protected $model;


    public function __construct(DI $di){
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
        $this->load = $this->di->get('load');
        //$this->model = $this->di->get('model');

        // инициализируем переменные
        $this->initVars();

    }


    public function __get($key){
        return $this->di->get($key);
    }


    // метод для инициализации переменных
    public function initVars(){

        $vars = array_keys(get_object_vars($this));

        foreach ($vars as $var){
            if($this->di->has($var)){
                $this->{$var} = $this->di->get($var);
            }
        }

        return $this;

    }


}