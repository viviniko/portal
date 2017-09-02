<?php

namespace Viviniko\Portal\Enums;

class PageCategories
{
    const POLICY = 1;
    const CUSTOMER_SERVICE = 2;
    const SHOPPING_GUIDE = 3;
    const HIGHLY_RECOMMENDED = 4;

    public static function values()
    {
        return [
            static::POLICY => 'Policy',
            static::CUSTOMER_SERVICE => 'Customer Service',
            static::SHOPPING_GUIDE => 'Shopping Guide',
            static::HIGHLY_RECOMMENDED => 'Highly Recommended',
        ];
    }
}