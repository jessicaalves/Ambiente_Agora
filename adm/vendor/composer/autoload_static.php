<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7d2699fbde492b14536d728fd7589929
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7d2699fbde492b14536d728fd7589929::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7d2699fbde492b14536d728fd7589929::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7d2699fbde492b14536d728fd7589929::$classMap;

        }, null, ClassLoader::class);
    }
}
