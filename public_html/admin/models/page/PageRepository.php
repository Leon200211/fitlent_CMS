<?php


namespace admin\models\page;


use engine\Model;



class PageRepository extends Model
{

    public function getPages(){

        $sql = $this->queryBuilder->select()
            ->from('pages')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);

    }


}