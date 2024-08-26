<?php

namespace App\Transformers;

use App\Models\Order;
use League\Fractal\TransformerAbstract;
use App\Models\Product;

class OrderTransformer extends TransformerAbstract
{
    protected $availableIncludes = [];
    protected $defaultIncludes = [];

    public $detailIncludes = [];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Order $order): array
    {
        return [
            'id' => $order->id,
            'name' => $order->name,
            'phone' => $order->phone,
            'address' => $order->address,
            'gender' => $order->gender,
            'note' => $order->note,
            'status_id' => $order->status_id,
            'products' => $order->products,
            'created_at' => $order->created_at->toIso8601String(),
        ];
    }

    // public function includeProduct(Order $order)
    // {
    //     return $this->item($order->category, new ProductCategoryTransformer());
    // }
}
