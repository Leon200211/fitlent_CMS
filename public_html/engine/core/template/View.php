<?php


namespace engine\core\template;

use engine\core\template\Theme;

// класс для работы с шаблонами
class View
{

    protected $theme;


    public function __construct(){
        $this->theme = new Theme();
    }



    /**
     * @param $template
     * @param array $vars
     */
    public function render($template, $vars = []){

        $templatePath = $this->getTemplatePath($template, ENV);

        if(!is_file($templatePath)){
            throw new \InvalidArgumentException(sprintf('Template "%s" not found in "%s"', $template, $templatePath));
        }


        $this->theme->setData($vars);

        // создание переменных из массива
        extract($vars);

        ob_start();
        // отключаем неявную отчистку
        ob_implicit_flush(0);


        try{
            require $templatePath;
        }catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();

    }


    /**
     * @param $template
     * @param null $env
     * @return string
     */
    private function getTemplatePath($template, $env = null){

        if($env == 'cms'){
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }

        return ROOT_DIR . '/views/' . $template . '.php';

    }


}