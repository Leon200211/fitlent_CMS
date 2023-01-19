<?php


namespace engine\service\plugin;


use engine\core\plugin\Plugin;
use engine\service\AbstractProvider;



class Provider extends AbstractProvider
{

    public $serviceName = 'plugin';


    public function init()
    {
        $customize = new Plugin($this->di);
        $this->di->set($this->serviceName, $customize);

        return $this;
    }


}