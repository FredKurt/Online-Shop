<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c4fdc2ee075be9033618a104e68e844
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hp\\OlineShop\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hp\\OlineShop\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c4fdc2ee075be9033618a104e68e844::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c4fdc2ee075be9033618a104e68e844::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c4fdc2ee075be9033618a104e68e844::$classMap;

        }, null, ClassLoader::class);
    }
}