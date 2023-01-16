<?php


namespace admin\models\page;


use engine\core\database\ActiveRecord;
use engine\Model;



class PageRepository extends Model
{

    public function getPages(){

        $sql = $this->queryBuilder->select()
            ->from('pages')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);

    }


    // метод создание новой страницы
    public function createPage($params){

        $page = new Page;
        $page->setTitle(addslashes($params['title']));
        $page->setContent(addslashes($params['content']));
        $pageId = $page->save();

        return $pageId;

    }


    // метод редактирования страницы
    public function updatePage($params){

        if(isset($params['page_id'])){
            $page = new Page($params['page_id']);
            $page->setTitle(addslashes($params['title']));
            $page->setContent(addslashes($params['content']));
            $page->save();
        }

    }


    public function getPageData($id){
        $page = new Page($id);
        return $page->findOne();
    }


}