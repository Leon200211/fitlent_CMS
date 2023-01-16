<?php


namespace engine;


use engine\DI\DI;


// класс для загрузки моделей
class Load
{

    const MASK_MODEL_ENTITY = '\%s\models\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\models\%s\%sRepository';

    public $di;

    public function __construct(DI $di){
        $this->di = $di;
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

}