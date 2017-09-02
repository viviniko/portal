<?php
namespace Viviniko\Portal\Services\Widget;

use Viviniko\Portal\Contracts\WidgetService;
use Viviniko\Repository\SimpleRepository;

class EloquentWidget extends SimpleRepository implements WidgetService
{
    use ValidatesWidgetData;

    protected $modelConfigKey = 'portal.widget';

    protected $fieldSearchable = ['id', 'name', 'display_name', 'type'];

    public function make($name)
    {
        $widget = $this->findBy('name', $name)->first();

        return $widget ? new Widget($widget) : null;
    }
}