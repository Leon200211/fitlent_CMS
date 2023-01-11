<?php


namespace cms\controllers;


// контроллер для домашней страницы
class HomeController extends CmsController
{

    public function index(){
        $data = ['name' => 'kle'];
        $this->view->render('index', $data);
    }

    public function news($id){
        var_dump($id);
    }

}