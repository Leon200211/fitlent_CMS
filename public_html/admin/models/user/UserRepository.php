<?php


namespace admin\models\user;


use engine\Model;



class UserRepository extends Model
{

    public function getUsers(){

        $sql = $this->queryBuilder->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);

    }


}