<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb3a8269574b2b3c89b02a5c0b6553d9
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb3a8269574b2b3c89b02a5c0b6553d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb3a8269574b2b3c89b02a5c0b6553d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbb3a8269574b2b3c89b02a5c0b6553d9::$classMap;

        }, null, ClassLoader::class);
    }
}
