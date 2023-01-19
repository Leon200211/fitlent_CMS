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
        case 'controllers':
            return sprintf($pathMask, 'controller');
        case 'config':
            return sprintf($pathMask, 'config');
        case 'models':
            return sprintf($pathMask, 'model');
        case 'views':
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



// функция для возврата шаблона тем
function getThemes(){

    $themesPath = '../content/themes';
    $list = scandir($themesPath);
    $baseUrl = \engine\core\config\Config::item('baseUrl');
    $themes = [];

    if(!empty($list)){
        unset($list[0]);
        unset($list[1]);

        foreach ($list as $dir) {

            $pathThemeDir = $themesPath . '/' . $dir;
            $pathConfig = $pathThemeDir . '/theme.json';
            $pathScreen = $baseUrl . '/content/themes/' . $dir . '/screen.jpg';

            if (is_dir($pathThemeDir) and is_file($pathConfig)) {
                $config = file_get_contents($pathConfig);
                $info = json_decode($config);

                $info->screen = $pathScreen;
                $info->dirTheme = $dir;

                $themes[] = $info;
            }

        }
    }

    return $themes;

}




