<?php

// файл хранит все маршруты




$this->router->add('home', '/', 'HomeController:index');
$this->router->add('news', '/news/(id:int)', 'HomeController:news');

