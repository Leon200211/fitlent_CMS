<?php


namespace engine\core\template;

use admin\models\setting\SettingRepository;
use engine\DI\DI;

// класс для работы с настройками шаблона
class Setting
{

    protected static $di;
    protected static $settingRepository;


    public function __construct($di){
        self::$di = $di;
        self::$settingRepository = new SettingRepository(self::$di);
    }


    public static function get($keyField){
        return self::$settingRepository->getSettingsValue($keyField);
    }


}