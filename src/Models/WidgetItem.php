<?php
namespace Viviniko\Portal\Models;

use Viviniko\Support\Database\Eloquent\Model;

class WidgetItem extends Model
{
    protected $tableConfigKey = 'portal.widget_items_table';

    protected $fillable = ['parent_id', 'title', 'description', 'url', 'target', 'image', 'image_alt', 'sort', 'widget_id', 'extra'];

    protected $appends = ['text', 'icon'];

    public function widget()
    {
        return $this->belongsTo(Widget::class);
    }

    public function getTextAttribute() {
        $text = $this->title;
        if (!empty($this->url)) {
            $text .= " ($this->url)";
        }
        return $text;
    }

    public function getIconAttribute() {
        return $this->image;
    }
}