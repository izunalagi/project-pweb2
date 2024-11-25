<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerValidationRequest extends FormRequest
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
            'name' => 'required|unique:buyers,name|string|max:255',
            'age' => 'required|numeric',
            'address' => 'required',
            
        ];
    }

     public function messages()
     {
     return [
     'name.required' => 'Nama produk harus diisi',
     'name.unique' => 'Nama produk tidak boleh sama',
     'name.max' => 'Nama produk maksimal 255 karakter',
     'age.required' => 'age harus diisi',
     'age.numeric' => 'age harus berupa angka',
     'address.required' => 'address harus diisi',
     ];
    }
}
