<?php


namespace engine\service\view;

use engine\service\AbstractProvider;
use engine\core\template\View;


class Provider extends AbstractProvider
{

    public $serviceName = 'view';


    public function init()
    {
        $view = new View($this->di);

        $this->di->set($this->serviceName, $view);
    }


}