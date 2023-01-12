<?php


namespace engine\service\request;

use engine\service\AbstractProvider;
use engine\core\request\Request;


class Provider extends AbstractProvider
{

    public $serviceName = 'request';


    public function init()
    {
        $request = new Request();

        $this->di->set($this->serviceName, $request);
    }


}