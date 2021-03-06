<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf1d67209abda87b7b9b7776f980b77a8
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bebru\\Uztvanka\\Login\\' => 21,
            'Bebru\\Uztvanka\\Controllers\\' => 27,
            'Bebru\\Uztvanka\\' => 15,
        ),
        'A' => 
        array (
            'App\\DB\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bebru\\Uztvanka\\Login\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/login',
        ),
        'Bebru\\Uztvanka\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
        'Bebru\\Uztvanka\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'App\\DB\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf1d67209abda87b7b9b7776f980b77a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf1d67209abda87b7b9b7776f980b77a8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
