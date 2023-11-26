<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "title" => ['required', 'string', 'max:255'],
            "description" => ['required', 'string'],
            "information" => ['required', 'string'],
            "feature" => ['required'],
            "qty" => ['integer', 'required'],
            "price" => ['integer', 'required'],
            "article" => ['string', 'required'],
            "like" => ['integer'],
            "is_active" => ['required'],
            "category_id" =>  ['integer', 'required'],
            "sub_category_id" => ['integer', 'required'],
            "brand_id" => ['integer', 'required'],
            'images' => 'required',
        ];
    }
}
