<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidationRequest extends FormRequest
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
            'photo' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'photo.required' => 'Foto harus diisi',
            // 'photo.mimes' => 'Foto harus berupa format png, jpg',
            'tittle.required' => 'tittle harus diisi',
            'description.required' => 'deskripsi harus diisi',
        ];
    }
}
