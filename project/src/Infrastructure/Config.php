<?php

namespace Forex4you\Infrastructure;

class Config
{
    public static $configs = null;

    public static function getConfigs(): array
    {
        if (null === self::$configs) {
            self::$configs = require dirname(__DIR__) . '/../config/config.php';
        }

        return self::$configs;
    }
}