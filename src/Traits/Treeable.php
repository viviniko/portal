<?php
namespace Viviniko\Portal\Traits;

use Illuminate\Support\Collection;

trait Treeable
{
    /**
     * @param Collection $collection
     * @param null $parentId
     * @param string $parentKey
     * @return Collection
     */
    public function buildTree(Collection $collection, $parentId = null, $parentKey = 'parent_id')
    {
        $groupNoes = $collection->groupBy($parentKey);
        return $collection->map(function ($item) use ($groupNoes) {
            $item->setRelation('children', collect($groupNoes->get($item->id, [])));
            return $item;
        })->filter(function ($item) use ($parentId, $parentKey) {
            return $item->$parentKey == $parentId;
        })->values();
    }


    public function flattenTree(Collection $tree, $column = 'name', $key = 'id', $depth = 0) {
        $items = [];

        // $icons = ['├', '└', '│', '─'];
        $space = '──';

        // $count = count($tree);
        foreach ($tree as $index => $node) {
            $items[$node->{$key}] = str_repeat($space, $depth) . $node->{$column};
            if (!empty($node->children)) {
                $items = $items + $this->flattenTree($node->children, $column, $key, $depth + 1);
            }
        }

        return $items;
    }
}