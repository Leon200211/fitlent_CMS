<?php


namespace admin\controllers;


// контроллер для входа в админку
class LoginController extends AdminController
{


    public function form(){
        $this->view->render('login');
    }


}