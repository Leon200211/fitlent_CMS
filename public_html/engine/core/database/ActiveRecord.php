<?php


namespace engine\core\database;

use \ReflectionClass;
use \ReflectionProperty;

// паттерн проектирования для работы с БД
trait ActiveRecord
{

    protected $db;
    protected $queryBuilder;


    public function __construct($id = 0){

        global $di;

        $this->db = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if($id){
            $this->setId($id);
        }

    }


    public function getTable(){
        return $this->table;
    }


    public function save(){

        $properties = $this->getIssetProperties();

        try{
            if(isset($this->id)){
                $this->db->execute(
                    $this->queryBuilder->update($this->getTable())
                    ->set($properties)
                    ->where('id', $this->id)
                    ->sql(),
                    $this->queryBuilder->values
                );
            }else{
                $this->db->execute(
                    $this->queryBuilder->insert($this->getTable())
                        ->set($properties)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }

            return $this->db->lastInsertId();

        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }


    private function getIssetProperties(){

        $properties = [];

        foreach ($this->getProperties() as $key => $property){
            if(isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;

    }


    private function getProperties(){

        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

        return $properties;

    }


}