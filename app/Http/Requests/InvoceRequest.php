<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoceRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|string',
            'company_name' => 'nullable|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'zip_code' => 'required|string',
            'note' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('İsim alanı zorunludur.'),
            'name.string' => __('İsim bir metin olmalıdır.'),
            'name.min' => __('İsim en az 3 karakterden oluşmalıdır.'),
            'email.required' => __('E-posta alanı zorunludur.'),
            'email.email' => __('Geçerli bir e-posta adresi girilmelidir.'),
            'phone.required' => __('Telefon alanı zorunludur.'),
            'phone.string' => __('Telefon bir metin olmalıdır.'),
            'company_name.string' => __('Şirket adı bir metin olmalıdır.'),
            'address.required' => __('Adres alanı zorunludur.'),
            'address.string' => __('Adres bir metin olmalıdır.'),
            'country.required' => __('Ülke alanı zorunludur.'),
            'country.string' => __('Ülke bir metin olmalıdır.'),
            'city.required' => __('Şehir alanı zorunludur.'),
            'city.string' => __('Şehir bir metin olmalıdır.'),
            'district.required' => __('İlçe alanı zorunludur.'),
            'district.string' => __('İlçe bir metin olmalıdır.'),
            'zip_code.required' => __('Posta kodu alanı zorunludur.'),
            'zip_code.string' => __('Posta kodu bir metin olmalıdır.'),
            'note.string' => __('Not bir metin olmalıdır.'),
        ];
    }
}
