<?php


namespace engine\core\router;


class UrlDispatcher
{

    // список поддерживаемых http запросов
    private $methods = [
        'GET',
        'POST'
    ];


    // маршруты с разным типом запросов
    private $routes = [
        'GET' => [],
        'POST' => []
    ];


    // паттерны для передачи данных
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];


    private function routes($method){
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }


    // метод для добавления паттернов
    public function addPattern($key, $pattern){
        $this->patterns[$key] = $pattern;
    }


    public function dispatch($method, $uri){
        // получаем все маршруты
        $routes = $this->routes(strtoupper($method));

        if(array_key_exists($uri, $routes)){
            return new DispatchedRoute($routes[$uri]);
        }

    }

}