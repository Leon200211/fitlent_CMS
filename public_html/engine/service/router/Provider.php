<?php


namespace engine\service\router;

use engine\service\AbstractProvider;
use engine\core\router\Router;


class Provider extends AbstractProvider
{

    public $serviceName = 'router';


    public function init()
    {
        $router = new Router('http://fitlent.cms/');

        $this->di->set($this->serviceName, $router);
    }


}