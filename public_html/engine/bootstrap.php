<?php

require_once  __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Function.php';

use engine\CMS;
use engine\DI\DI;

try{
    // Dependency injection
    $di = new DI();

    $services = require __DIR__ . '/config/service.php';

    foreach ($services as $service){
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new CMS($di);
    $cms->run();

}catch (\ErrorException $e){
    echo $e->getMessage();
}




