<?php


namespace admin\controllers;

use engine\Controller;
use engine\core\authorization\Auth;

// главный контроллер для модуля "CMS"
class AdminController extends Controller
{

    protected $auth;


    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if(!$this->auth->isAutorized() and $this->request->server['REQUEST_URI'] !== '/admin/login/'){
            //редирект
            header('Location: /admin/login/', true, 301);
        }

    }

}

