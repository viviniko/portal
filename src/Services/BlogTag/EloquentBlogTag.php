<?php

namespace Viviniko\Portal\Services\BlogTag;

use Viviniko\Portal\Contracts\BlogTagService;
use Viviniko\Repository\SimpleRepository;

class EloquentBlogTag extends SimpleRepository implements BlogTagService
{
    use ValidatesBlogTagData;

    protected $modelConfigKey = 'portal.blog_tag';
}