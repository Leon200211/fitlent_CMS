<?php


namespace engine\service\database;

use engine\service\AbstractProvider;
use engine\core\database\Connection;


class provider extends AbstractProvider
{

    public $serviceName = 'db';


    public function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }


}