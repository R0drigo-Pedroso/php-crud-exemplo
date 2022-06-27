<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6370bd81dec340d045a53431dd5e775e
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CrudPoo\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CrudPoo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit6370bd81dec340d045a53431dd5e775e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6370bd81dec340d045a53431dd5e775e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6370bd81dec340d045a53431dd5e775e::$classMap;

        }, null, ClassLoader::class);
    }
}