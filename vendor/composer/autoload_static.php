<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit164efc71f7ac7bb1cc19f19b8da42c1c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MetzWeb\\Instagram\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MetzWeb\\Instagram\\' => 
        array (
            0 => __DIR__ . '/..' . '/cosenary/instagram/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit164efc71f7ac7bb1cc19f19b8da42c1c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit164efc71f7ac7bb1cc19f19b8da42c1c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}