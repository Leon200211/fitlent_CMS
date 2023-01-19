<?php


namespace engine\core\request;


// класс для записи всех супер глобальных массивов
class Request
{

    public $get = [];
    public $post = [];
    public $request = [];
    public $cookie = [];
    public $files = [];
    public $server = [];


    public function __construct(){
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->cookie = $_COOKIE;
        $this->files = $_FILES;
        $this->server = $_SERVER;
    }


    public function get($key = false){
        return $key ? $this->get[$key] : $this->get;
    }


    public function post($key = false){
        return $key ? $this->post[$key] : $this->post;
    }


}