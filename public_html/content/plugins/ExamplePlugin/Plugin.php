<?php

namespace plugin\ExamplePlugin;

class Plugin extends \engine\Plugin
{
    /**
     * @return array
     */
    public function details()
    {
        return [
            'name'        => 'Plugin Demo',
            'description' => 'Demonstration plugin.',
            'author'      => 'Artem Melnik',
            'icon'        => 'icon-leaf'
        ];
    }

    public function init()
    {

    }
}