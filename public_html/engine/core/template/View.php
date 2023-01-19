<?php


namespace engine\core\template;

use engine\core\template\Theme;
use engine\DI\DI;

// класс для работы с шаблонами
class View
{

    public $di;
    protected $theme;
    protected $setting;


    public function __construct(DI $di){
        $this->di = $di;
        $this->theme = new Theme();
        $this->setting = new Setting($di);
    }



    /**
     * @param $template
     * @param array $vars
     */
    public function render($template, $vars = []){

        if(file_exists($this->getThemePath() . '/function.php')){
            include_once $this->getThemePath() . '/function.php';
        }

        $templatePath = $this->getTemplatePath($template, ENV);

        if(!is_file($templatePath)){
            throw new \InvalidArgumentException(sprintf('Template "%s" not found in "%s"', $template, $templatePath));
        }


        $vars['lang'] = $this->di->get('language');
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

        return path('view') . '/' . $template . '.php';

    }


    public function getThemePath(){
        return ROOT_DIR . '/content/themes/default';
    }



}