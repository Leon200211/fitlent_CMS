<?php


namespace engine\service\config;

use engine\service\AbstractProvider;
use engine\core\config\Config;


class Provider extends AbstractProvider
{

    public $serviceName = 'config';


    public function init()
    {
        $config['main'] = Config::file('main');
        $config['database'] = Config::file('database');

        $this->di->set($this->serviceName, $config);
    }


}