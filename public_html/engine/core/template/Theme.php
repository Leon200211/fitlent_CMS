<?php


namespace engine\core\template;


// класс для работы с темами
class Theme
{

    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    public $url = '';
    protected $data = [];



    // метод для работы с хедером страницы
    public function header($name = ''){
        $name = (string) $name;
        $file = 'header';

        // подставляем переменную в нашу константу
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this->loadTemplateFile($file);
    }


    public function footer($name = ''){
        $name = (string) $name;
        $file = 'footer';

        // подставляем переменную в нашу константу
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }

        $this->loadTemplateFile($file);
    }


    public function sidebar($name = ''){
        $name = (string) $name;
        $file = 'sidebar';

        // подставляем переменную в нашу константу
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this->loadTemplateFile($file);
    }


    public function block($name = '', $data = []){
        $name = (string) $name;

        // подставляем переменную в нашу константу
        if($name !== ''){
            $name = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this->loadTemplateFile($name, $data);
    }



    /**
     * @param $nameFile
     * @param array $data
     * @throws \Exception
     */
    // метод для загрузки файлов шаблонов
    private function loadTemplateFile($nameFile, $data = []){

        // нужно исправить
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';
        if(ENV == 'admin'){
            $templateFile = ROOT_DIR . '/views/' . $nameFile . '.php';
        }


        if(is_file($templateFile)){
            extract(array_merge($data, $this->data));
            require_once $templateFile;
        }else{
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }

    }



    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }


}