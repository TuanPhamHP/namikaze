<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductControllerRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Transformers\ProductTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ProductController extends BaseApiController
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $category_ids = $request->query('category_ids');
        $brand_ids = $request->query('brand_ids');
        $query = $this->product->query();

        if ($category_ids) {
            $category_ids_array = explode(',', $category_ids);
            $query->whereIn('category_id', $category_ids_array);
        }

        if ($brand_ids) {
            $brand_ids_array = explode(',', $brand_ids);
            $query->whereIn('brand_id', $brand_ids_array);
        }

        $products = $request->get('pagination') === 'false' ? $query->get() :
            $query->paginate($request->get('size'));

        $data = $this->transform($products, new ProductTransformer(), 'products');

        return $this->respondSuccess($data);
    }

    public function detail($id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            return $this->respondNotFound('Product not found');
        }
        $transformer = new ProductTransformer();
        $data = $this->transform($product, $transformer, 'product', $transformer->detailIncludes);
        return $this->respondSuccess($data);
    }

    public function store(StoreProductControllerRequest $request)
    {
        $data = $request->all();
        $this->product->create($data);
        return $this->respondSuccess($data);
    }

}
