<?php


namespace admin\controllers;

use admin\models\user\UserRepository;

// контроллер вывода информации админ панели
class DashboardController extends AdminController
{

    public function index(){

        $userModel = $this->load->model('User');
        $userModel->repository->test();
        var_dump($userModel->repository->getUsers());

        $this->view->render('dashboard');
    }

}