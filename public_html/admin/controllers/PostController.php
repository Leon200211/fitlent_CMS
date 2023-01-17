<?php


namespace admin\controllers;



// контроллер для работы с постами
class PostController extends AdminController
{


    // метод для вывода всех страниц
    public function listing(){

        $this->load->model('post');

        $this->data['posts'] = $this->model->post->getPosts();

        $this->view->render('posts/list', $this->data);

    }


    // метод для открытия страницы добавления страницы
    public function create(){

        $this->load->model('Post');

        $this->view->render('posts/create');

    }


    // метод для добавлении страницы
    public function add(){

        $this->load->model('Post');
        $params = $this->request->post;

        if(isset($params['title'])){
            $pageId = $this->model->post->createPost($params);
            echo $pageId;
        }

    }


    // метод вывода страницы редактирования
    public function edit($id){

        $this->load->model('Post');

        $this->data['page'] = $this->model->post->getPostData($id);
        $this->view->render('posts/edit', $this->data);


    }


    // метод изменение информации на странице
    public function update(){

        $params = $this->request->post;

        $this->load->model('Post');

        if(isset($params['title'])){
            $pageId = $this->model->post->updatePost($params);
            echo $pageId;
        }

    }


}