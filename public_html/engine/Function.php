<?php


/**
 * Returns path to a Flexi CMS folder.
 *
 * @param string $section
 * @return string
 */
function path($section)
{
    // Return path to correct section.
    switch (strtolower($section)) {
        case 'controller':
            return ROOT_DIR . DIRECTORY_SEPARATOR . 'controller';
        case 'config':
            return ROOT_DIR . DIRECTORY_SEPARATOR . 'config';
        case 'model':
            return ROOT_DIR . DIRECTORY_SEPARATOR . 'model';
        case 'view':
            return ROOT_DIR . DIRECTORY_SEPARATOR . 'views';
        case 'language':
            return ROOT_DIR . DIRECTORY_SEPARATOR . 'language';
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