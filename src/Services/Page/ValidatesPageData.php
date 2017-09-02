<?php
namespace Viviniko\Portal\Services\Page;

use Viviniko\Support\ValidatesData;

trait ValidatesPageData
{
    use ValidatesData;

    public function validateCreateData($data)
    {
        $this->validate($data, $this->rules());
    }

    public function validateUpdateData($newsId, $data)
    {
        $this->validate($data, $this->rules());
    }

    public function rules($newsId = null)
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'url_rewrite' => 'required'
        ];
    }
}