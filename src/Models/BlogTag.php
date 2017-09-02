<?php

namespace Viviniko\Portal\Models;

use Viviniko\Support\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $tableConfigKey = 'portal.blog_tags_table';

    protected $fillable = ['name'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, config('portal.blog_blog_tag_table'), 'tag_id', 'blog_id');
    }

    public function getBlogCountAttribute()
    {
        return $this->blogs()->count();
    }
}
