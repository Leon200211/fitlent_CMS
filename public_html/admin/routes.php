<?php

// файл хранит все маршруты




$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');


// PAGES
// GET
$this->router->add('pages', '/admin/pages/', 'PageController:listing');
$this->router->add('page-create', '/admin/pages/create/', 'PageController:create');
$this->router->add('page-edit', '/admin/page/edit/(id:int)', 'PageController:edit');
// POST
$this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
$this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');


// POSTS
// GET
$this->router->add('posts', '/admin/posts/', 'PostController:listing');
$this->router->add('post-create', '/admin/posts/create/', 'PostController:create');
$this->router->add('post-edit', '/admin/post/edit/(id:int)', 'PostController:edit');
// POST
$this->router->add('post-add', '/admin/post/add/', 'PostController:add', 'POST');
$this->router->add('post-update', '/admin/post/update/', 'PostController:update', 'POST');


// Настройки
$this->router->add('settings-general', '/admin/settings/general/', 'SettingsController:general');
$this->router->add('settings-menus', '/admin/settings/appearance/menus/', 'SettingsController:menus');

// Settings Routes (POST)
$this->router->add('settings-update', '/admin/settings/update/', 'SettingsController:updateSetting', 'POST');
$this->router->add('setting-add-menu', '/admin/settings/ajaxMenuAdd/', 'SettingsController:ajaxMenuAdd', 'POST');
$this->router->add('setting-add-menu-item', '/admin/settings/ajaxMenuAddItem/', 'SettingsController:ajaxMenuAddItem', 'POST');
$this->router->add('setting-sort-menu-item', '/admin/settings/ajaxMenuSortItems/', 'SettingsController:ajaxMenuSortItems', 'POST');
$this->router->add('setting-remove-menu-item', '/admin/settings/ajaxMenuRemoveItem/', 'SettingsController:ajaxMenuRemoveItem', 'POST');


