<?php


namespace cms\controllers;


// контроллер по обработки всех ошибок
class ErrorController extends CmsController
{

    public function page404(){
        echo 404;
    }

}