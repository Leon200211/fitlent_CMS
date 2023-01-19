<?php


namespace engine\core\template;


use cms\models\menuItem\MenuItemRepository;
use engine\DI\DI;
use cms\models\menu\MenuRepository;


// класс для отображения меню
class Menu
{

    /**
     * @var DI
     */
    protected static $di;

    /**
     * @var MenuRepository
     */
    protected static $menuRepository;

    /**
     * @var MenuItemRepository
     */
    protected static $menuItemRepository;

    /**
     * Menu constructor.
     * @param $di
     */
    public function __construct($di)
    {
        self::$di = $di;
        self::$menuRepository = new MenuRepository(self::$di);
        self::$menuItemRepository = new MenuItemRepository(self::$di);
    }

    /**
     * @param int $menuId
     * @return mixed
     */
    public static function getItems($menuId)
    {
        return self::$menuItemRepository->getItems($menuId);
    }

}