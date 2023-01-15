<?php


namespace engine;


// класс для загрузки моделей
class Load
{

    const MASK_MODEL_ENTITY = '\%s\models\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\models\%s\%sRepository';


    public function model($modelName, $modelDir = false){

        global $di;

        $modelNameNS = mb_strtolower($modelName);
        $modelName = ucfirst($modelName);
        $model = new \stdClass();
        $modelDir = $modelDir ?: $modelNameNS;

        $namespaceEntity = sprintf(
            self::MASK_MODEL_ENTITY,
            ENV, $modelDir, $modelName
        );

        $namespaceRepository = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        $model->entity = $namespaceEntity;
        $model->repository = new $namespaceRepository($di);

        return $model;

    }

}