<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:product,name',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price_buy' => 'required|numeric',
            'qty' => 'required|integer',
            'detail' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'brand_id.required' => 'Vui lòng chọn thương hiệu.',
            'price_buy.required' => 'Giá nhập là bắt buộc.',
            'detail.required' => 'Chi tiết không được để trống',
            'qty.required' => 'Vui lòng chọn số lượng',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'image.image' => 'Tệp tải lên phải là hình ảnh.'
        ];
    }
}
