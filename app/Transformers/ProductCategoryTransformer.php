<?php

namespace App\Transformers;

use App\Models\ProductCategory;
use League\Fractal\TransformerAbstract;

class ProductCategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];
    protected $defaultIncludes = [
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductCategory $category): array
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
            'image' => $category->image,
        ];
    }

}
