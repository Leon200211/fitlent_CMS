<?php


namespace engine\core\router;


class DispatchedRoute
{

    private $controller;
    private $parametres;


    public function __construct($controller, $parametres = []){
        $this->controller = $controller;
        $this->parametres = $parametres;
    }


    public function getController(){
        return $this->controller;
    }


    public function getParameters(){
        return $this->parametres;
    }

}