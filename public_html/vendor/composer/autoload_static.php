<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3565c23a1d57106ccd6008b17282280c
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'engine\\DI\\' => 10,
            'engine\\' => 7,
        ),
        'c' => 
        array (
            'cms\\' => 4,
        ),
        'a' => 
        array (
            'admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'engine\\DI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine/DI',
        ),
        'engine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine',
        ),
        'cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cms',
        ),
        'admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3565c23a1d57106ccd6008b17282280c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3565c23a1d57106ccd6008b17282280c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3565c23a1d57106ccd6008b17282280c::$classMap;

        }, null, ClassLoader::class);
    }
}
