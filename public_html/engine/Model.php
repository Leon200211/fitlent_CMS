<?php


namespace engine;

use engine\core\database\QueryBuilder;
use engine\DI\DI;

// абстрактный класс для работы моделей
abstract class Model
{

    protected $di;
    protected $db;
    protected $config;

    public $queryBuilder;


    public function __construct(DI $di){

        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->config = $this->di->get('config');

        $this->queryBuilder = new QueryBuilder();

    }


}