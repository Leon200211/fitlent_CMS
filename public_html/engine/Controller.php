<?php


namespace engine;

use \engine\DI\DI;

// класс от которого наследуются все контроллеры
abstract class Controller
{

    /**
     * @var \engine\DI\DI
     */
    protected $di;

    protected $db;

    public function __construct(DI $di){
        $this->di = $di;
    }



}