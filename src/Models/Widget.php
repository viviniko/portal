<?php
namespace Viviniko\Portal\Models;

use Viviniko\Portal\Enums\WidgetPlatform;
use Viviniko\Portal\Enums\WidgetTypes;
use Viviniko\Support\Database\Eloquent\Model;

class Widget extends Model
{
    protected $tableConfigKey = 'portal.widgets_table';

    protected $fillable = ['name', 'display_name', 'type', 'description', 'platform'];

    public function getTypeNameAttribute()
    {
        return WidgetTypes::values()[$this->attributes['type']];
    }

    public function getPlatformTextAttribute()
    {
        return WidgetPlatform::values()[$this->attributes['platform']];
    }

    public function items()
    {
        return $this->hasMany(WidgetItem::class);
    }
}