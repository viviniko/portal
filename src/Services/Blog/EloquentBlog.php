<?php

namespace Viviniko\Portal\Services\Blog;

use Viviniko\Portal\Contracts\BlogService;
use Viviniko\Repository\SimpleRepository;
use Viviniko\Repository\ValidatesData;

class EloquentBlog extends SimpleRepository implements BlogService
{
    use ValidatesBlogData;
    protected $modelConfigKey = 'portal.blog';
}