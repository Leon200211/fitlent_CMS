<?php


namespace engine\core\authorization;

use engine\helper\Cookie;

// класс для авторизации
class Auth implements AuthInterface
{

    protected $autorized = false;
    protected $user;


    // метод возвращает статус авторизации
    public function isAutorized(){
        return $this->autorized;
    }


    // метод возвращает пользователя
    public function user(){
        return $this->user;
    }


    // метод авторизации
    public function login($user){
        // устанавливаем куки
        Cookie::set('auth.authorized', true);
        Cookie::set('auth.user', $user);

        $this->autorized = true;
        $this->user = $user;

    }


    // метод выхода
    public function logout(){
        // Удаляем куки
        Cookie::delete('auth.authorized');
        Cookie::delete('auth.user');

        $this->autorized = false;
        $this->user = null;
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