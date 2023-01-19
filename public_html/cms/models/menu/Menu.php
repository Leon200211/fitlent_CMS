<?php


namespace cms\models\menu;

use engine\core\database\ActiveRecord;

// модель для работы с меню шаблонов
class Menu
{

    use ActiveRecord;

    protected $table = 'menu';

    public $id;
    public $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}