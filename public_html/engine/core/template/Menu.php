<?php


namespace engine\core\template;


use engine\DI\DI;
use cms\models\menu\MenuRepository;


// класс для отображения меню
class Menu
{

    protected static $di;
    protected static $menuRepository;


    public function __construct($di){
        self::$di = $di;
        self::$menuRepository = new MenuRepository(self::$di);
    }


    public static function show(){

    }


    public static function getItems(){
        return self::$menuRepository->getAllItems();
    }

}