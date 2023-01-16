<?php


namespace admin\controllers;


// контроллер для отрисовки страниц в админке
class PageController extends AdminController
{

    // метод для вывода всех страниц
    public function listing(){

        $this->load->model('page');

        $this->data['pages'] = $this->model->page->getPages();

        $this->view->render('pages/list', $this->data);

    }


    // метод для открытия страницы добавления страницы
    public function create(){

        $this->load->model('Page');

        $this->view->render('pages/create');

    }


    // метод для добавлении страницы
    public function add(){

        $this->load->model('Page');
        $params = $this->request->post;

        if(isset($params['title'])){
            $pageId = $this->model->page->createPage($params);
            echo $pageId;
        }

    }


    // метод вывода страницы редактирования
    public function edit($id){

        $this->load->model('Page');

        $this->data['page'] = $this->model->page->getPageData($id);
        $this->view->render('pages/edit', $this->data);


    }


    // метод изменение информации на странице
    public function update(){

        $params = $this->request->post;

        $this->load->model('Page');

        if(isset($params['title'])){
            $pageId = $this->model->page->updatePage($params);
            echo $pageId;
        }

    }


}