<?php

require_once  __DIR__ . '/../vendor/autoload.php';

use engine\CMS;
use engine\DI\DI;

try{
    // Dependency injection
    $di = new DI();

    $cms = new CMS($di);
    $cms->run();

}catch (\ErrorException $e){
    echo $e->getMessage();
}




