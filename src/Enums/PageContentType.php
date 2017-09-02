<?php

namespace Viviniko\Portal\Enums;

class PageContentType
{
    const CONTENT = 0;
    const LINK = 1;

    public static function values()
    {
        return [
            static::CONTENT => trans('portal.page.content'),
            static::LINK => trans('portal.page.link')
        ];
    }
}