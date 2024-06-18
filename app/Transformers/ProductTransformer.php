<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Product;

class ProductTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'category',
        'brand'
    ];
    protected $defaultIncludes = [

    ];

    public $detailIncludes = [
        'category',
        'brand',
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product): array
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'category_id' => $product->category_id,
            'brand_id' => $product->brand_id,
            'status_id' => $product->status_id,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'images' => $product->images,
            'preview_image' => $product->preview_image,
            'quantity' => $product->quantity,
            'description' => $product->description,
        ];
    }

    public function includeCategory(Product $product)
    {
        return $this->item($product->category, new ProductCategoryTransformer());
    }

    public function includeBrand(Product $product)
    {
        return $this->item($product->brand, new BrandTransformer());
    }
}
