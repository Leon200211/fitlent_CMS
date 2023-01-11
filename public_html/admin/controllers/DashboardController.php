<?php


namespace admin\controllers;


// контроллер вывода информации админ панели
class DashboardController extends AdminController
{

    public function index(){
        $this->view->render('dashboard');
    }

}