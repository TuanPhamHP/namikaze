<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends BaseApiController
{
    /**
     * @var Brand $brand
     */
    protected $brand;

    //

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $data = $this->brand->all();
        return $this->respond(true, $data, 200, 0, 'Brand list');
    }


    /**
     * @param StoreBrandRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreBrandRequest $request)
    {
        $data = $request->all();
        $this->brand->create($data);
        return response()->json([
            'status' => 'success',
            'message' => 'stored',
            'data' => $data
        ]);
    }

    /**
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail(string $id)
    {
        $data = $this->brand->find($id);
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Brand not found',
            ], 404);
        }
        return $this->respond(true, $data, 200, 0, 'Brand detail');
    }

}
