<?php


namespace admin\controllers;


// контроллер для отрисовки страниц в админке
class PageController extends AdminController
{

    public function listing(){

        $pageModel = $this->load->model('page');

        $data[] = $pageModel->repository->getPages();

        $this->view->render('pages/list', $data);

    }


    public function create(){

        $pageModel = $this->load->model('page');

        $this->view->render('pages/create');

    }


}