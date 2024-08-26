<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Transformers\OrderTransformer;
use Illuminate\Http\Request;

class OrderController extends BaseApiController
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index(Request $request)
    {
        $phone = $request->query('phone');

        $query = $this->order->query();

        if ($phone) {
            $query->where('phone', 'like', '%' . $phone . '%');
        }

        $orders = $request->get('pagination') === 'false' ? $query->get() :
            $query->paginate($request->get('size'));

        $data = $this->transform($orders, new OrderTransformer(), 'orders');

        return $this->respondSuccess($data);
    }


    public function store(StoreOrderRequest $request)
    {
        $data = $request->all();
        $this->order->create($data);
        return $this->respondSuccess($data);
    }
}
