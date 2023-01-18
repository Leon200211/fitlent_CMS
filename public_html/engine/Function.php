<?php


/**
 * Returns path to a Flexi CMS folder.
 *
 * @param string $section
 * @return string
 */
function path($section)
{

    $pathMask = ROOT_DIR . DIRECTORY_SEPARATOR . '%s';

    if(ENV == 'cms'){
        $pathMask = ROOT_DIR . DIRECTORY_SEPARATOR . strtolower(ENV) . DIRECTORY_SEPARATOR . '%s';
    }

    // Return path to correct section.
    switch (strtolower($section)) {
        case 'controller':
            return sprintf($pathMask, 'controller');
        case 'config':
            return sprintf($pathMask, 'config');
        case 'model':
            return sprintf($pathMask, 'model');
        case 'view':
            return sprintf($pathMask, 'views');
        case 'language':
            return sprintf($pathMask, 'language');
        default:
            return ROOT_DIR;
    }
}

/**
 * Returns list languages
 *
 * @return array
 */
// сканируем все языки для cms
function languages()
{
    $directory = path('language');
    $list = scandir($directory);
    $languages = [];

    if (!empty($list)) {
        unset($list[0]);
        unset($list[1]);

        foreach ($list as $dir) {
            $pathLangDir = $directory . DIRECTORY_SEPARATOR . $dir;
            $pathConfig = $pathLangDir . '/config.json';
            if (is_dir($pathLangDir) and is_file($pathConfig)) {
                $config = file_get_contents($pathConfig);
                $info = json_decode($config);

                $languages[] = $info;
            }
        }
    }

    return $languages;
}