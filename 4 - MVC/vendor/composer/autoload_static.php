<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit40c923a059bd2832be3f8eed6e27af18
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Mvc\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit40c923a059bd2832be3f8eed6e27af18::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit40c923a059bd2832be3f8eed6e27af18::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit40c923a059bd2832be3f8eed6e27af18::$classMap;

        }, null, ClassLoader::class);
    }
}
