<?php


namespace engine\core\template;

// для загрузки шаблонов
class Component
{

    /**
     * @param $name
     * @param array $data
     * @throws \Exception
     */
    public static function load($name, $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $name . '.php';

        if (ENV == 'admin') {
            $templateFile = path('views') . '/' . $name . '.php';
        }

        if (is_file($templateFile)) {
            extract(array_merge($data, Theme::getData()));
            //require_once $templateFile;
            require $templateFile;
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }

}