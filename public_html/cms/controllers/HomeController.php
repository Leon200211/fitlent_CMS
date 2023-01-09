<?php


namespace cms\controllers;


// контроллер для домашней страницы
class HomeController extends CmsController
{

    public function index(){
        echo 123;
    }

    public function news($id){
        var_dump($id);
    }

}