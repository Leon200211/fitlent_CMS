<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3565c23a1d57106ccd6008b17282280c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit3565c23a1d57106ccd6008b17282280c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3565c23a1d57106ccd6008b17282280c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3565c23a1d57106ccd6008b17282280c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
