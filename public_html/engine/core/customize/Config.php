<?php


namespace engine\core\customize;


class Config
{

    protected $config = [
        'dashboardMenu' => [
            'classIcon' => 'icon-speedometer icons',
            'urlPath' => '/admin/',
            'title' => 'home'
        ],
        'pages' => [
            'classIcon' => 'icon-doc icons',
            'urlPath' => '/admin/pages/',
            'title' => 'pages'
        ],
        'posts' => [
            'classIcon' => 'icon-pencil icons',
            'urlPath' => '/admin/posts/',
            'title' => 'posts'
        ],
        'plugins' => [
            'classIcon' => 'icon-wrench icons',
            'urlPath' => '/admin/plugins/',
            'title' => 'Plugins'
        ],
        'settings' => [
            'classIcon' => 'icon-equalizer icons',
            'urlPath' => '/admin/settings/general/',
            'title' => 'settings'
        ]
    ];


    public function has($key){
        return isset($this->config[$key]);
    }


    public function get($key){
        return $this->has($key) ? $this->config[$key] : null;
    }


    public function set($key, $value){
        $this->config[$key] = $value;
    }


    public function getAllMenu(){
        return $this->config;
    }


}