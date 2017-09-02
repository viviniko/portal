<?php

namespace Viviniko\Portal\Services\BlogCategory;

use Viviniko\Portal\Contracts\BlogCategoryService;
use Viviniko\Repository\SimpleRepository;
use Viviniko\Portal\Traits\Treeable;

class EloquentBlogCategory extends SimpleRepository implements BlogCategoryService
{
    use ValidatesBlogCategoryData, Treeable;

    protected $modelConfigKey = 'portal.blog_category';

    public function tree()
    {
        $categories = $this->createModel()->newQuery()->select('*')->orderBy('sort', 'asc')->get();
        return $this->buildTree($categories);
    }
}