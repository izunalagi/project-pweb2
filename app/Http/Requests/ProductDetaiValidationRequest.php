<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetaiValidationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => 'required|unique:products,name|string|max:255',
            'unit' => 'required',
            'brand' => 'required',
        ];
    }

    public function messages()
    {
    return [
    'product_id.required' => 'Nama produk harus diisi',
    'product_id.unique' => 'Nama produk tidak boleh sama',
    'product_id.max' => 'Nama produk maksimal 255 karakter',
    'unit.required' => 'Unit harus diisi',
    'brand.required' => 'Brand harus diisi',
    ];
    }
}
