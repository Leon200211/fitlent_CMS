<?php


namespace admin\controllers;

use engine\Controller;
use engine\core\authorization\Auth;

// главный контроллер для модуля "CMS"
class AdminController extends Controller
{

    protected $auth;

    public $data = [];


    public function __construct($di) {
        parent::__construct($di);

        $this->auth = new Auth();
        $this->checkAuthorization();


        // разлогиниваемся
        if($this->auth->hashUser() == NULL){
            header('Location: /admin/login/');
            exit;
        }


        // подгрузка языка
        $this->load->language('dashboard/menu');

    }


    // метод для проверки авторизации
    public function checkAuthorization(){


    }



    public function logout(){
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit;
    }



}

