<?php

namespace Viviniko\Portal\Enums;

class WidgetPlatform
{
    const ALL = 0;
    const DESKTOP = 1;
    const PHONE = 2;

    public static function values()
    {
        return [
            self::ALL => 'All',
            self::DESKTOP => 'Desktop',
            static::PHONE => 'Phone',
        ];
    }
}