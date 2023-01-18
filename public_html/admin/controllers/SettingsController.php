<?php


namespace admin\controllers;


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

        echo $update;

    }



}