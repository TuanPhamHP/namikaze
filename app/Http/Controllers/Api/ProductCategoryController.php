<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends BaseApiController
{
    protected $productCategory;

    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $data = $this->productCategory->all()->toArray();
        return $this->respondSuccess($data);
    }

    /**
     * @param ProductCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->all();
        $this->productCategory->create($data);
        return $this->respondSuccess($data);
    }
}
