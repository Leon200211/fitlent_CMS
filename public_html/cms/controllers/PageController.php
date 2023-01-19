<?php


namespace cms\controllers;

use admin\models\page\PageRepository;
use cms\classes\Page;


class_alias('cms\\classes\\Page', 'Page');



class PageController extends CmsController
{
    const TEMPLATE_PAGE_MASK = 'page-%s';

    /**
     * @param string|int $segment
     */
    public function show($segment)
    {
        $this->load->model('Page', false, 'Admin');


        $pageModel = $this->model->page;

        $page = $pageModel->getPageBySegment($segment);

        if ($page === false) {
            header('Location: /');
            exit;
        }

        $template = 'page';
        if ($page->type !== 'page') {
            $template = sprintf(self::TEMPLATE_PAGE_MASK, $page->type);
        }

        Page::setStore($page);

        $this->view->render($template);
    }
}