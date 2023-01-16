<?php


namespace admin\controllers;


// контроллер для отрисовки страниц в админке
class PageController extends AdminController
{

    // метод для вывода всех страниц
    public function listing(){

        $pageModel = $this->load->model('page');

        $data['pages'] = $pageModel->repository->getPages();

        $this->view->render('pages/list', $data);

    }


    // метод для открытия страницы добавления страницы
    public function create(){

        $pageModel = $this->load->model('page');

        $this->view->render('pages/create');

    }


    // метод для добавлении страницы
    public function add(){

        $params = $this->request->post;

        $pageModel = $this->load->model('Page');


        if(isset($params['title'])){
            $pageId = $pageModel->repository->createPage($params);
            echo $pageId;
        }

    }


    // метод вывода страницы редактирования
    public function edit($id){

        $pageModel = $this->load->model('Page');
        $this->data['page'] = $pageModel->repository->getPageData($id);
        $this->view->render('pages/edit', $this->data);


    }


    // метод изменение информации на странице
    public function update(){

        $params = $this->request->post;
        $pageModel = $this->load->model('Page');

        if(isset($params['title'])){
            $pageId = $pageModel->repository->updatePage($params);
            echo $pageId;
        }

    }


}