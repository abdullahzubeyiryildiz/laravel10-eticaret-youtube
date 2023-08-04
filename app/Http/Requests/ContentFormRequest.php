<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim Soyisim Zorunlu',
            'name.string' => 'İsim Soyisim Karakterlerden oluşmalı',
            'name.min' => 'İsim Soyisim Minimum 3 karakterden olmalıdır.',
            'email.required' => 'E-posta zorunlu',
            'email.email' => 'Geçersiz bir email adresi',
            'subject.required' => 'Konu kısmı boş geçilemez',
            'message.required' => 'Mesaj kısmı boş geçilemez',
        ];
    }
}
