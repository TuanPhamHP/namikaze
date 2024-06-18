<?php

namespace App\Transformers;

use App\Models\Brand;
use League\Fractal\TransformerAbstract;

class BrandTransformer extends TransformerAbstract
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
    public function transform(Brand $brand): array
    {
        return [
            'id' => $brand->id,
            'name' => $brand->name,
            'description' => $brand->description,
            'image' => $brand->image,
        ];
    }

}
