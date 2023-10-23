<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaef60c7c634d41a40c0cbb4e9318054f
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Suntao\\RobotApi\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Suntao\\RobotApi\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitaef60c7c634d41a40c0cbb4e9318054f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaef60c7c634d41a40c0cbb4e9318054f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaef60c7c634d41a40c0cbb4e9318054f::$classMap;

        }, null, ClassLoader::class);
    }
}
