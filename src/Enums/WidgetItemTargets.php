<?php
namespace Viviniko\Portal\Enums;

class WidgetItemTargets
{
    const TARGET_SELF = '_self';
    const TARGET_BLANK = '_blank';
    public static function values()
    {
        return [
            static::TARGET_SELF => trans('app.target_self'),
            static::TARGET_BLANK => trans('app.target_blank')
        ];
    }
}