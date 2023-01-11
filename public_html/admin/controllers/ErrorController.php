<?php


namespace admin\controllers;




// контроллер по обработки всех ошибок
class ErrorController extends AdminController
{

    public function page404(){
        echo 404;
    }

}