<?php

namespace App\Http\Requests;


class StoreProductControllerRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required',
            'quantity' => 'required',
            'preview_image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Category is invalid',
            'brand_id.required' => 'Brand is required',
            'brand_id.exists' => 'Brand is invalid',
            'price.required' => 'Price is required',
            'quantity.required' => 'Quantity is required',
            'preview_image.required' => 'Preview Image is required',
        ];
    }
}
