<?php


namespace engine\core\database;

use \PDO;
use engine\core\config\Config;


// класс для соединения и работы с БД
class Connection
{

    private $link;


    public function __construct(){
        $this->connect();
    }


    private function connect(){

        //$config = require_once 'config.php';
        $config = Config::file('database');

        $dsn = 'mysql:host=' . $config['host'] .';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;

    }


    public function execute($sql, $values = []){
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }


    public function query($sql, $values = []){


        $sth = $this->link->prepare($sql);

        $sth->execute($values);

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false) return [];

        return $result;

    }


}