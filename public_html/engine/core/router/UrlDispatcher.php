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

        return $this->doDispatch($method, $uri);

    }


    private function doDispatch($method, $uri){

        foreach ($this->routes($method) as $route => $controller){
            $pattern = '#^' . $route . '$#s';
            if(preg_match($pattern, $uri, $parameters)){
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }

    }


    // метод для регистрации роута
    public function register($method, $pattern, $controller){
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }


    // метод для конвертации паттернов роутов
    private function convertPattern($pattern){
        if(strpos($pattern, '(') === false){
            return $pattern;
        }

        // если мы передаем аргументы через url
        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);

    }


    // метод по получению паттерна
    private function replacePattern($marches){
        return '(?<' . $marches[1] . '>' . strtr($marches[2], $this->patterns) . ')';
    }


    // метод для редактирования массивов параметров
    private function processParam($parameters){

        foreach ($parameters as $key => $value){
            if(is_int($key)){
                unset($parameters[$key]);
            }
        }

        return $parameters;

    }

}