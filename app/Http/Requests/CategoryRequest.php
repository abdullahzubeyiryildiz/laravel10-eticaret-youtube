<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:3',
            'content'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Başlık Zorunlu',
            'name.string' => 'Başlık Karakterlerden oluşmalı',
            'name.min' => 'Başlık Minimum 3 karakterden olmalıdır.',
            'content.required' => 'İçerik Zorunlu',
        ];
    }
}
