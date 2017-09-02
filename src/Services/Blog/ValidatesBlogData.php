<?php

namespace Viviniko\Portal\Services\Blog;

use Viviniko\Support\ValidatesData;

trait ValidatesBlogData
{
    use ValidatesData;

    public function validateCreateData($data)
    {
        $this->validate($data, $this->rules());
    }

    public function validateUpdateData($blogId, $data)
    {
        $this->validate($data, $this->rules($blogId));
    }

    public function rules($blogId = null)
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'url_rewrite' => 'required',
        ];
    }
}