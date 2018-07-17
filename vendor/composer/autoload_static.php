<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03f80bf76c391d9ddbda61340d8fc8bc
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cmfcmf\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cmfcmf\\' => 
        array (
            0 => __DIR__ . '/..' . '/cmfcmf/openweathermap-php-api/Cmfcmf',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit03f80bf76c391d9ddbda61340d8fc8bc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03f80bf76c391d9ddbda61340d8fc8bc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
