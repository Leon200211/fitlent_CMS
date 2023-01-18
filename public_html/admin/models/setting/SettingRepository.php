<?php


namespace admin\models\setting;


use engine\Model;


class SettingRepository extends Model
{

    // метод для получения настроек
    public function getSettings()
    {
        $sql = $this->queryBuilder->select()
            ->from('setting')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    // метод для обновление настроек
    public function update(array $params){
        if(!empty($params)){
            foreach ($params as $key => $value){
                $sql = $this->queryBuilder
                    ->update('setting')
                    ->set(['value' => $value])
                    ->where('key_field', $key)
                    ->sql();
                $this->db->execute($sql, $this->queryBuilder->values);
            }
        }
    }


}