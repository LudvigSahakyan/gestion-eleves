<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7dfa340e29864befa245a3f50aac245f
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GestionEleves\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GestionEleves\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7dfa340e29864befa245a3f50aac245f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7dfa340e29864befa245a3f50aac245f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}