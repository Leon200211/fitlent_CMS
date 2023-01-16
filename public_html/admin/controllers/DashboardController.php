<?php


namespace admin\controllers;

use admin\models\user\UserRepository;

// контроллер вывода информации админ панели
class DashboardController extends AdminController
{

    public function index(){

        $userModel = $this->load->model('User');

        $this->view->render('dashboard');

    }

}