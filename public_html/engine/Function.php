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
 * @param string $section
 * @return string
 */
function path_content($section = '')
{
    $pathMask = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . '%s';

    // Return path to correct section.
    switch (strtolower($section))
    {
        case 'themes':
            return sprintf($pathMask, 'themes');
        case 'plugins':
            return sprintf($pathMask, 'plugins');
        case 'uploads':
            return sprintf($pathMask, 'uploads');
        default:
            return $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content';
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


// метод для получения плагинов
function getPlugins(){

    global $di;

    $pluginsPath = path_content('plugins');
    $list        = scandir($pluginsPath);
    $plugins     = [];

    if (!empty($list)) {
        unset($list[0]);
        unset($list[1]);

        foreach ($list as $namePlugin) {
            $namespace = '\\plugin\\' . $namePlugin . '\\Plugin';

            if (class_exists($namespace)) {
                $plugin = new $namespace($di);
                $plugins[$namePlugin] = $plugin->details();
            }
        }
    }

    return $plugins;

}



/**
 * @param string $switch
 * @return array
 */
function getTypes($switch = 'page')
{
    $themePath = path_content('themes') . '/' . \Setting::get('active_theme');
    $list      = scandir($themePath);
    $types     = [];

    if (!empty($list)) {
        unset($list[0]);
        unset($list[1]);

        foreach ($list as $name) {
            if (\Engine\Helper\Common::searchMatchString($name, $switch)) {
                list($switch, $key) = explode('-', $name, 2);

                if (!empty($key)) {
                    list($nameType) = explode('.', $key, 2);
                    $types[$nameType] = ucfirst($nameType);
                }
            }
        }
    }

    return $types;
}

