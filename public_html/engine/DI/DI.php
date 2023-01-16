<?php


namespace engine\DI;


// класс для работы с контейнером зависимостей
class DI
{

    private $container = [];


    /**
     * @param $key
     * @param $value
     * @return $this
     */
    // метод для создание зависимостей в контейнере
    public function set($key, $value){
        $this->container[$key] = $value;

        return $this;
    }


    /**
     * @param $key
     * @return mixed
     */
    // метод для возврата зависимостей
    public function get($key){
        if($this->has($key)){
            return $this->container[$key];
        }
    }


    /**
     * @param $key
     * @return bool
     */
    // проверка на наличие определенной зависимости
    public function has($key){
        return isset($this->container[$key]);
    }


    // метод для добавления значения в уже существующий ключ
    public function push($key, $element = []){

        if($this->has($key) !== null){
            $this->set($key, []);
        }

        if(!empty($element)){
            $this->container[$key][$element['key']] = $element['value'];
        }

    }


}