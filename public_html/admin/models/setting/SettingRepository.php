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
            ->where('section', 'general')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
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


    // метод для извлечение настроек из БД
    public function getSettingsValue($keyField){
        $sql = $this->queryBuilder->select('value')
            ->from('setting')
            ->where('key_field', $keyField)
            ->sql();

        $query = $this->db->query($sql, $this->queryBuilder->values);

        return isset($query[0]) ? $query[0]['value'] : null;
    }


    // метод для обновления активации темы
    public function updateActiveTheme($theme){
        $sql = $this->queryBuilder
            ->update('setting')
            ->set(['value' => $theme])
            ->where('key_field', 'active_theme')
            ->sql();

        $this->db->execute($sql, $this->queryBuilder->values);
    }


}