<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends ApiRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9\-\(\)\/\+\s]*$/|max:20',
            'product_ids' => 'required|array',
            'product_ids.*' => 'integer|exists:products,id',
            'address' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá :max ký tự.',

            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
            'phone.max' => 'Số điện thoại không được vượt quá :max ký tự.',

            'product_ids.required' => 'Danh sách sản phẩm là bắt buộc.',
            'product_ids.array' => 'Danh sách sản phẩm phải là một mảng.',
            'product_ids.*.integer' => 'ID sản phẩm phải là một số nguyên.',
            'product_ids.*.exists' => 'ID sản phẩm :input không tồn tại.',

            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá :max ký tự.',
        ];
    }
}
