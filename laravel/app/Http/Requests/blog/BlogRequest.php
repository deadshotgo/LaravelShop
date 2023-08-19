<?php

namespace App\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'text' => ['required'],
            'title' => ['required'],
            'img' => ['required', 'max:255'],
            'preview' => ['required', 'max:255'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
