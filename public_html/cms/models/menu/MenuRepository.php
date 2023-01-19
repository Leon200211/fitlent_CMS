<?php


namespace cms\models\menu;


use engine\Model;


class MenuRepository extends Model
{

    // метод получения меню из БД
    public function getAllItems(){
        $sql = $this->queryBuilder->select()
            ->from('menu')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


}