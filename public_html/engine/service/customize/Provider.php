<?php


namespace engine\service\customize;

use engine\service\AbstractProvider;
use engine\core\customize\Customize;


class Provider extends AbstractProvider
{

    public $serviceName = 'customize';


    public function init()
    {
        $customize = new Customize($this->di);
        $this->di->set($this->serviceName, $customize);

        return $this;
    }


}