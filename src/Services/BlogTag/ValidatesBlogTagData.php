<?php

namespace Viviniko\Portal\Services\BlogTag;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\ValidatesData;

trait ValidatesBlogTagData
{
    use ValidatesData;

    public function validateCreateData($data)
    {
        $this->validate($data, $this->rules());
    }

    public function validateUpdateData($tagId, $data)
    {
        $this->validate($data, $this->rules($tagId));
    }

    public function rules($tagId = null)
    {
        $tagId = is_null($tagId) ? '' : ',' . $tagId;
        return [
            'name' => 'required|unique:' . Config::get('portal.blog_tags_table') . ',name' . $tagId,
        ];
    }
}