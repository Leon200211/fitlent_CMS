<?php


namespace engine\core\authorization;

use engine\helper\Cookie;

// класс для авторизации
class Auth implements AuthInterface
{

    protected $autorized = false;
    protected $hashUser;


    // метод возвращает статус авторизации
    public function isAutorized(){
        return $this->autorized;
    }


    // метод возвращает пользователя
    public function hashUser(){
        return Cookie::get('auth_user');
    }


    // метод авторизации
    public function login($user){

        // устанавливаем куки
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);


        $this->autorized = true;
        $this->hashUser = $user;

    }


    // метод выхода
    public function logout(){
        // Удаляем куки
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');

        $this->autorized = false;
        $this->hashUser = null;
    }


    // метод для кеширования
    public static function salt(){
        return (string) rand(10000000, 99999999);
    }


    // метод кеширования пароля
    public static function encryptPassword($password, $salt = ''){
        return hash('sha256', $password . $salt);
    }


}