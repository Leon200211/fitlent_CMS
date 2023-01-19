<?php

// файл хранит все маршруты




$this->router->add('home', '/', 'HomeController:index');
$this->router->add('news', '/news/(id:int)', 'HomeController:news');

$this->router->add('page', '/page/(segment:any)', 'PageController:show');