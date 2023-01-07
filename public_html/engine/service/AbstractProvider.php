<?php


namespace engine\service;


abstract class AbstractProvider
{

    /**
     * @var \engine\DI\DI;
     */
    protected $di;

    public function __construct(\engine\DI\DI $di){
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();


}