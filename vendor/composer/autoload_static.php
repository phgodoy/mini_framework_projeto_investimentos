<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a82069926b6b6720d0cebbb1f8b57ba
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a82069926b6b6720d0cebbb1f8b57ba::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a82069926b6b6720d0cebbb1f8b57ba::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
