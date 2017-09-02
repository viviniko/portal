<?php

namespace Viviniko\Portal\Models;

use Viviniko\Support\Database\Eloquent\Model;
use Viviniko\Urlrewrite\UrlrewriteTrait;

class Blog extends Model
{
    use UrlrewriteTrait;

    protected $tableConfigKey = 'portal.blogs_table';

    protected $fillable = ['title', 'content', 'category_id', 'url_rewrite', 'is_active', 'meta_title', 'meta_keywords', 'meta_description'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, config('portal.blog_blog_tag_table'), 'blog_id', 'tag_id');
    }
}