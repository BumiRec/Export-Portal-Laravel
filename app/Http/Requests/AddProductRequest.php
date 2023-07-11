<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'           => 'required|string|max:255',
            'description'    => 'required|string|max:255',
            'price'          => 'required|numeric',
            'type'           => 'required|string|max:255',
            'views'          => 'integer',
            'category_id'    => 'required|integer',
            'subcategory_id' => 'required|integer',
            'company_id'     => 'required|integer',
        ];
    }
}
