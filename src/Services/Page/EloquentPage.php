<?php

namespace Viviniko\Portal\Services\Page;

use Viviniko\Portal\Contracts\PageService;
use Viviniko\Repository\SimpleRepository;

class EloquentPage extends SimpleRepository implements PageService
{
    use ValidatesPageData;

    protected $modelConfigKey = 'portal.page';

    protected $fieldSearchable = ['id', 'title' => 'like', 'category', 'is_active', 'url' => 'like', 'content_type'];
}