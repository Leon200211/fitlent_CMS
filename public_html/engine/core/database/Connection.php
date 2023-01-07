<?php


namespace engine\core\database;

use \PDO;

// класс для соединения и работы с БД
class Connection
{

    private $link;


    public function __construct(){
        $this->connect();
    }


    private function connect(){

        //$config = require_once 'config.php';
        $config = [
            'host' => '127.0.0.1:3307',
            'db_name' => 'yandex',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8'
        ];

        $dsn = 'mysql:host=' . $config['host'] .';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;

    }


    public function execute($sql){
        $sth = $this->link->prepare($sql);

        return $sth->execute();
    }


    public function query($sql){

        $sth = $this->link->prepare($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false) return [];

        return $result;

    }


}