<?php


namespace engine\helper;


// класс для работы с куками
class Cookie
{

    // метод создание куки
    public static function set($key, $value, $time = 31536000){
        setcookie($key, $value, time(), $time, '/');
    }


    // метод получение куки по ключу
    public static function get($key){

        if(isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }

        return null;

    }


    // метод удаление купи по ключу
    public static function delete($key){

        if(isset($_COOKIE[$key])){
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }

    }


}