<?php


namespace engine;



// основной класс нашей CMS системы, который запускает всю логику работы
class CMS
{
    private $di;


    public function __construct($di){

        $this->di = $di;

    }


    // метод запуска всей CMS
    public function run(){
        echo 12;
    }

}