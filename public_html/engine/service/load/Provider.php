<?php


namespace engine\service\load;

use engine\service\AbstractProvider;
use engine\Load;


class Provider extends AbstractProvider
{

    public $serviceName = 'load';


    public function init()
    {
        $load = new Load($this->di);

        $this->di->set($this->serviceName, $load);
    }


}