<?php

namespace plugin\LiveTest;


class Plugin extends \engine\Plugin
{
    /**
     * @return array
     */
    public function details()
    {
        return [
            'name'        => 'Live Test Demo',
            'description' => 'Demonstration plugin.',
            'author'      => 'Artem Melnik',
            'icon'        => 'icon-leaf'
        ];
    }

    public function init()
    {

    }
}