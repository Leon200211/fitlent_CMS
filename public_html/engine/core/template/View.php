<?php


namespace engine\core\template;

use cms\models\menuItem\MenuItem;
use engine\core\template\Theme;
use engine\DI\DI;

// класс для работы с шаблонами
class View
{


    public $di;
    protected $theme;
    protected $setting;
    protected $menu;


    public function __construct(DI $di)
    {
        $this->di      = $di;
        $this->theme   = new Theme();
        $this->setting = new Setting($di);
        $this->menu    = new Menu($di);
    }

    /**
     * @param $template
     * @param array $data
     * @throws \Exception
     */
    public function render($template, $data = [])
    {
        $functions = Theme::getThemePath() . '/functions.php';
        if (file_exists($functions)) {
            include_once $functions;
        }

        $templatePath = $this->getTemplatePath($template, ENV);

        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }

        $this->theme->setData($data);

        extract($data);
        ob_start();
        ob_implicit_flush(0);

        try {
            require($templatePath);
        } catch (\Exception $e){
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
    private function getTemplatePath($template, $env = null)
    {
        if ($env === 'cms') {
            $theme = \Setting::get('active_theme');

            if ($theme == '') {
                $theme = \Engine\Core\Config\Config::item('defaultTheme');
            }

            return ROOT_DIR . '/content/themes/' . $theme . '/' . $template . '.php';
        }


        return path('views') . '/' . $template . '.php';
    }



}