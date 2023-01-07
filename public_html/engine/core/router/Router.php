<?php


namespace engine\core\router;


// класс для роутинга
class Router
{

    private $routes = [];
    private $host;
    private $dispatcher;

    public function __construct($host){
        $this->host = $host;
    }


    /**
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     */
    // метод для добавления маршрутов
    public function add($key, $pattern, $controller, $method = 'GET'){

        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];

    }


    public function dispatch($method, $uri){

    }


    public function getDispatcher(){

        if($this->dispatcher === NULL){

        }

        $this->dispatcher;

    }


}