<?php


namespace admin\controllers;


use cms\models\menuItem\MenuItemRepository;
use engine\core\template\Theme;


// класс для работы с настройками
class SettingsController extends AdminController
{

    // метод вывода настроек
    public function general(){
        $this->load->model('Setting');

        $this->data['settings'] = $this->model->setting->getSettings();
        $this->data['languages'] = languages();

        $this->view->render('settings/general', $this->data);
    }


    // метод для сохранения настроек
    public function updateSetting(){

        $this->load->model('Setting');

        $params = $this->request->post;
        $update = $this->model->setting->update($params);

    }


    // метод для работы с меню шаблонов
    public function menus()
    {
        $this->load->model('Menu', false, 'cms');
        $this->load->model('MenuItem', false, 'cms');

        $this->data['menuId']   = $this->request->get['menu_id'];
        $this->data['menus']    = $this->model->menu->getList();
        $this->data['editMenu'] = $this->model->menuItem->getItems($this->data['menuId']);

        $this->view->render('settings/menus', $this->data);
    }


    // метод для добавления нового меню
    public function ajaxMenuAdd()
    {
        $params = $this->request->post;

        $this->load->model('Menu', false, 'cms');

        if (isset($params['name']) && strlen($params['name']) > 0) {
            $addMenu = $this->model->menu->add($params);

            echo $addMenu;
        }
    }


    // метод добавление элемента в меню
    public function ajaxMenuAddItem()
    {
        $params = $this->request->post;

        $this->load->model('MenuItem', false, 'cms');

        if (isset($params['menu_id']) && strlen($params['menu_id']) > 0) {
            $id = $this->model->menuItem->add($params);

            $item = new \stdClass;
            $item->id   = $id;
            $item->name = MenuItemRepository::NEW_MENU_ITEM_NAME;
            $item->link = '#';

            Theme::block('settings/menu_item', [
                'item' => $item
            ]);
        }
    }


    // метод для сортировки меню
    public function ajaxMenuSortItems()
    {
        $params = $this->request->post;

        $this->load->model('MenuItem', false, 'cms');

        if (isset($params['data']) && !empty($params['data'])) {
            $sortItem = $this->model->menuItem->sort($params);
        }
    }


    // метод для удаления элемента меню
    public function ajaxMenuRemoveItem()
    {
        $params = $this->request->post;

        $this->load->model('MenuItem', false, 'cms');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->menuItem->remove($params['item_id']);

            echo $removeItem;
        }
    }


}