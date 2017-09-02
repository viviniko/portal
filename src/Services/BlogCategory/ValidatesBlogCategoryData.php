<?php

namespace Viviniko\Portal\Services\BlogCategory;

use Viviniko\Support\ValidatesData;

trait ValidatesBlogCategoryData
{
    use ValidatesData;

    public function validateCreateData($data)
    {
        $this->validate($data, $this->rules());
    }

    public function validateUpdateData($categoryId, $data)
    {
        $this->validate($data, $this->rules($categoryId));
    }

    public function rules($categoryId = null)
    {
        $categoryId = is_null($categoryId) ? '' : ',' . $categoryId;
        return [
            'name' => 'required|unique:' . config('portal.blog_categories_table') . ',name' . $categoryId,
            'url_rewrite' => 'required',
        ];
    }
}