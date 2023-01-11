<?php


namespace engine\core\config;


// класс для работы со всеми конфигами
class Config
{

    /**
     * @param $key
     * @param string $group
     * @return mixed|null
     * @throws \Exception
     */
    // метод по получению значение из конфига
    public static function item($key, $group = 'items'){

        $groupItems = static::file($group);

        return isset($groupItems[$key]) ? $groupItems[$key] : null;

    }



    /**
     * @param $group
     * @return array
     * @throws \Exception
     */
    // подключение файлов конфига
    public static function file($group){

        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . ENV . '/config/' . $group . '.php';

        if(file_exists($path)){

            $items = require_once $path;

            if(is_array($items)){
                return $items;
            }else{
                throw new \Exception(
                    sprintf('Config file <strong>%s</strong> is not a valid array.', $path)
                );
            }

        }else{
            throw new \Exception(
                sprintf('Cannot load config from file, file <strong>%s</strong> dose not exist.', $path)
            );
        }

    }

}