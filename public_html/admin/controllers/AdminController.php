<?php


namespace admin\controllers;

use engine\Controller;
use engine\core\authorization\Auth;

// главный контроллер для модуля "CMS"
class AdminController extends Controller
{

    protected $auth;


    public function __construct($di) {
        parent::__construct($di);

        $this->auth = new Auth();
        $this->checkAuthorization();


        // разлогиниваемся
        if (isset($this->request->get['logout'])) {
            $this->auth->logout();
        }

    }


    public function checkAuthorization(){

        // авторизация из куки
        if($this->auth->hashUser() !== NULL){
            $this->auth->login($this->auth->hashUser());
        }

        if(!$this->auth->isAutorized()){
            //редирект
            header('Location: /admin/login/', true, 301);
            exit;
        }

    }


}

