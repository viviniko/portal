<?php

namespace Viviniko\Portal\Contracts;

use Viviniko\Portal\Services\Widget\Widget;

interface WidgetService
{
    /**
     * Make widget.
     *
     * @param $name
     * @return Widget
     */
    public function make($name);
}
