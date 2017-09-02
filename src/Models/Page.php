<?php

namespace Viviniko\Portal\Models;

use Viviniko\Portal\Enums\PageCategories;
use Viviniko\Portal\Enums\PageContentType;
use Viviniko\Support\Database\Eloquent\Model;
use Viviniko\Urlrewrite\UrlrewriteTrait;

class Page extends Model
{
    use UrlrewriteTrait;

    protected $tableConfigKey = 'portal.pages_table';

    protected $fillable = ['title', 'content_type', 'content', 'category', 'url_rewrite', 'meta_title', 'meta_keywords', 'meta_description'];

    public function getCategoryNameAttribute()
    {
        return PageCategories::values()[$this->attributes['category']];
    }

    public function getContentTypeTextAttribute()
    {
        return PageContentType::values()[$this->attributes['content_type']];
    }

    public function getUrlAttribute()
    {
        return url($this->url_rewrite);
    }
}
