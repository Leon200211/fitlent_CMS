<?php


namespace engine\core\template;


use engine\core\config\Config;

// класс для работы с темами
class Theme
{

    /**
     * Rules template name
     */
    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    const URL_THEME_MASK = '/content/themes/%s';

    /**
     * Url current theme
     * @type string
     */
    protected static $url = '';

    /**
     * @var array
     */
    protected static $data = [];


    public static function getUrl(){
        $currentTheme = Config::item('defaultTheme', 'main');

        return sprintf(self::URL_THEME_MASK, $currentTheme);
    }


    /**
     * @param null $name
     */
    public static function header($name = null)
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file);
    }

    /**
     * @param string $name
     */
    public static function footer($name = '')
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file);
    }

    /**
     * @param string $name
     */
    public static function sidebar($name = '')
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file);
    }

    /**
     * @param string $name
     * @param array $data
     */
    public static function block($name = '', $data = [])
    {
        $name = (string) $name;

        if ($name !== '') {
            Component::load($name, $data);
        }
    }

    /**
     * @param $name
     * @param $function
     * @return string
     */
    private static function detectNameFile($name, $function)
    {
        return empty(trim($name)) ? $function : sprintf(self::RULES_NAME_FILE[$function], $name);
    }

    /**
     * @return array
     */
    public static function getData()
    {
        return static::$data;
    }

    /**
     * @param array $data
     */
    public static function setData($data)
    {
        static::$data = $data;
    }


}