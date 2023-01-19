<?php


namespace admin\models\page;


use engine\core\database\ActiveRecord;
use engine\Model;



class PageRepository extends Model
{

    public function getPages()
    {
        $sql = $this->queryBuilder->select()
            ->from('pages')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function getPageData($id)
    {
        $page = new Page($id);

        return $page->findOne();
    }

    /**
     * @param string $segment
     * @return object|bool
     */
    public function getPageBySegment($segment)
    {
        $sql = $this
            ->queryBuilder
            ->select()
            ->from('pages')
            ->where('segment', $segment)
            ->limit(1)
            ->sql()
        ;

        $result = $this->db->query($sql, $this->queryBuilder->values);

        return isset($result[0]) ? $result[0] : false;
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createPage($params)
    {
        $page = new Page;
        $page->setTitle($params['title']);
        $page->setContent($params['content']);
        $page->setSegment(\Engine\Helper\Text::transliteration($params['title']));
        $pageId = $page->save();

        return $pageId;
    }

    public function updatePage($params)
    {
        if (isset($params['page_id'])) {
            $page = new Page($params['page_id']);
            $page->setTitle($params['title']);
            $page->setContent($params['content']);
            $page->setStatus($params['status']);
            $page->setType($params['type']);
            $page->save();
        }
    }


}