<?php
namespace Viviniko\Portal\Enums;

class PageShowStatus
{
    const ACTIVE = 1;
    const BANNED = 0;

    public static function values()
    {
        return [
            static::ACTIVE => 'Active',
            static::BANNED => 'Banned',
        ];
    }
}
