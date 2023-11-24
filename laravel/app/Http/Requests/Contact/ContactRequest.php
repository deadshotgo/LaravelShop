<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'path' => ['required'],
            'address' => ['required'],
            'gmail' => ['required'],
            'phone_number' => ['required'],
            'footer_text' => ['required'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}