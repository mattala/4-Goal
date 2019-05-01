<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1f710a6a214eae5b16c90c9e93b62962
{
    public static $files = array (
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pusher\\' => 7,
            'Psr\\Log\\' => 8,
            'Private\\' => 8,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pusher\\' => 
        array (
            0 => __DIR__ . '/..' . '/pusher/pusher-php-server/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Private\\' => 
        array (
            0 => __DIR__ . '/../..' . '/private',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
    );

    public static $classMap = array (
        'Database' => __DIR__ . '/../..' . '/private/Database.php',
        'Models\\ModelsBase' => __DIR__ . '/../..' . '/models/ModelsBase.php',
        'Models\\Player' => __DIR__ . '/../..' . '/models/Player.php',
        'Models\\Team' => __DIR__ . '/../..' . '/models/Team.php',
        'Models\\User' => __DIR__ . '/../..' . '/models/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1f710a6a214eae5b16c90c9e93b62962::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1f710a6a214eae5b16c90c9e93b62962::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1f710a6a214eae5b16c90c9e93b62962::$classMap;

        }, null, ClassLoader::class);
    }
}
