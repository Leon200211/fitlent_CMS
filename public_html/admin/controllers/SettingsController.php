<?php


namespace admin\controllers;


// класс для работы с настройками
class SettingsController extends AdminController
{

    public function general(){
        $this->load->model('Setting');

        $this->data['settings'] = $this->model->setting->getSettings();
        $this->view->render('settings/general', $this->data);
    }





}