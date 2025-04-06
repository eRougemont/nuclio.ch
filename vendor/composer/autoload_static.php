<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit21e5e389be1bd932d12b0610cee37eb4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'O' => 
        array (
            'Oeuvres\\Xsl\\' => 12,
            'Oeuvres\\Teinte\\' => 15,
            'Oeuvres\\Kit\\' => 12,
        ),
        'G' => 
        array (
            'GalenusVerbatim\\Verbatim\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Oeuvres\\Xsl\\' => 
        array (
            0 => __DIR__ . '/..' . '/oeuvres/xsl',
        ),
        'Oeuvres\\Teinte\\' => 
        array (
            0 => __DIR__ . '/..' . '/oeuvres/teinte/src',
        ),
        'Oeuvres\\Kit\\' => 
        array (
            0 => __DIR__ . '/..' . '/oeuvres/kit/src',
        ),
        'GalenusVerbatim\\Verbatim\\' => 
        array (
            0 => __DIR__ . '/..' . '/galenus-verbatim/verbatim/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'ParsedownExtra' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown-extra',
            ),
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit21e5e389be1bd932d12b0610cee37eb4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit21e5e389be1bd932d12b0610cee37eb4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit21e5e389be1bd932d12b0610cee37eb4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit21e5e389be1bd932d12b0610cee37eb4::$classMap;

        }, null, ClassLoader::class);
    }
}
