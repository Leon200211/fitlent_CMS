<?php


namespace admin\models\setting;


use engine\Model;


class SettingRepository extends Model
{

    public function getSettings()
    {
        $sql = $this->queryBuilder->select()
            ->from('setting')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

}