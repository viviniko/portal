<?php

namespace Viviniko\Portal\Enums;

class WidgetTypes
{
    const MENU = 1;
    const LIST = 2;
    const SINGLE = 3;
    const PRODUCT = 4;

    public static function values()
    {
        return [
            static::MENU => 'Menu',
            static::LIST => 'List',
            static::SINGLE => 'Single',
            static::PRODUCT => 'Product'
        ];
    }
}