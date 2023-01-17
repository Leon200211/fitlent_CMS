<?php


namespace admin\models\post;


use engine\core\database\ActiveRecord;
use engine\Model;



class PostRepository extends Model
{

    public function getPosts(){

        $sql = $this->queryBuilder->select()
            ->from('posts')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);

    }


    // метод создание новой страницы
    public function createPost($params){

        $page = new Post;
        $page->setTitle(addslashes($params['title']));
        $page->setContent(addslashes($params['content']));
        $pageId = $page->save();

        return $pageId;

    }


    // метод редактирования страницы
    public function updatePost($params){

        if(isset($params['post_id'])){
            $page = new Post($params['post_id']);
            $page->setTitle(addslashes($params['title']));
            $page->setContent(addslashes($params['content']));
            $page->save();
        }

    }


    public function getPostData($id){
        $page = new Post($id);
        return $page->findOne();
    }


}