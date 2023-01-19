<?php


namespace engine\helper;


// класс для вспомогательных функций для работы нашего движка
class Common
{

    // метод является ли запрос метод POST
    static function isPost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            return true;
        }

        return false;

    }


    // метод является ли запрос метод POST
    static function isGet(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return true;
        }

        return false;

    }


    // узнаем метод обращения
    static function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }


    // получаем url
    static function getPathUrl(){
        $pathUrl = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUrl, '?')){
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;

    }


    /**
     * @param string $string
     * @param string $find
     * @return bool
     */
    static function searchMatchString($string, $find)
    {
        if (strripos($string, $find) !== false) {
            return true;
        }

        return false;
    }

    /**
     * @param string $key
     * @return bool
     */
    static function isLinkActive($key)
    {
        if (self::searchMatchString($_SERVER['REQUEST_URI'], $key)) {
            return true;
        }

        return false;
    }



}