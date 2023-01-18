<?php

require_once  __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Function.php';

class_alias('engine\\core\\template\\Asset', 'Asset');
class_alias('engine\\core\\template\\Theme', 'Theme');

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

    $di->set('model', []);

    $cms = new CMS($di);
    $cms->run();

}catch (\ErrorException $e){
    echo $e->getMessage();
}




