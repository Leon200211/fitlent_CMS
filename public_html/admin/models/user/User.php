<?php


namespace admin\models\user;


use engine\core\database\ActiveRecord;


// сущность у модели User
class User
{

    use ActiveRecord;

    protected $table = 'user';
    public $id;
    public $email;
    public $password;
    public $role;
    public $hash;
    public $dateReg;


    public function getId(){
        return $this->id;
    }


    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return mixed
     */
    public function getDateReg()
    {
        return $this->dateReg;
    }

    /**
     * @param mixed $dateReg
     */
    public function setDateReg($dateReg): void
    {
        $this->dateReg = $dateReg;
    }


}