<?php


namespace engine;


use engine\DI\DI;


// класс для загрузки моделей
class Load
{

    const MASK_MODEL_ENTITY = '\%s\models\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\models\%s\%sRepository';

    const FILE_MASK_LANGUAGE = 'Language/%s/%s.ini';

    public $di;

    public function __construct(DI $di){
        $this->di = $di;

        return $this;
    }


    public function model($modelName, $modelDir = false){

        $modelName = mb_strtolower($modelName);
        $modelName = ucfirst($modelName);
        $modelDir = $modelDir ?: $modelName;


        $namespaceModel = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        $idClassModel = class_exists($namespaceModel);

//        if(class_exists($idClassModel)){
//            //$this->di->set($modelName, new $namespaceModel($this->di));
//            $this->di->push('model', [
//                'key' => mb_strtolower($modelName),
//                'value' => new $namespaceModel($this->di)
//            ]);
//        }

        if($idClassModel){
            $modelRegistry = $this->di->get('model') ?: new \stdClass();
            $modelRegistry->{mb_strtolower($modelName)} = new $namespaceModel($this->di);

            $this->di->set('model', $modelRegistry);
        }

        return $idClassModel;

    }


    // метод для перевода информации на сайте на другой язык
    public function language($path){

        $file = sprintf(
            self::FILE_MASK_LANGUAGE,
            'russian', $path
        );

        $content = parse_ini_file($file, true);

        $languageName = $this->toCamelCase($path);

        $language = $this->di->get('language') ?: new \stdClass();
        $language->{$languageName} = $content;

        $this->di->set('language', $language);

        return $content;

    }


    // приводим к "Верблюжьему регистру"
    private function toCamelCase($str)
    {
        $replace = preg_replace('/[^a-zA-Z0-9]/', ' ', $str);
        $convert = mb_convert_case($replace, MB_CASE_TITLE);
        $result  = lcfirst(str_replace(' ', '', $convert));

        return $result;
    }


}