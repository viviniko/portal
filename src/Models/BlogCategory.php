<?php

namespace Viviniko\Portal\Models;

use Viviniko\Urlrewrite\UrlrewriteTrait;
use Viviniko\Support\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use UrlrewriteTrait;

    protected $tableConfigKey = 'portal.blog_categories_table';

    protected $fillable = ['name', 'parent_id', 'description', 'sort', 'url_rewrite', 'meta_title', 'meta_keywords', 'meta_description'];

    protected $appends = ['text'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'id', 'category_id');
    }

    public function getTextAttribute()
    {
        return $this->attributes['name'];
    }
}