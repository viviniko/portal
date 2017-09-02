<?php
namespace Viviniko\Portal\Services\Widget;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\ValidatesData;

trait ValidatesWidgetData
{
    use ValidatesData;

    public function validateCreateData($data)
    {
        $this->validate($data, $this->rules());
    }

    public function validateUpdateData($widgetId, $data)
    {
        $this->validate($data, $this->rules($widgetId));
    }

    public function rules($widgetId = null)
    {
        $widgetId = is_null($widgetId) ? '' : ',' . $widgetId;
        return [
            'name' => 'required|unique:' . Config::get('portal.widgets_table') . ',name' . $widgetId,
            'type' => 'required'
        ];
    }
}