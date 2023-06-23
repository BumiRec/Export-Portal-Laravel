<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageCompaniesRequest extends FormRequest
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
            'name' => 'string|max:255',
            'keywords' => 'string',
            'country' => 'string',
            'web_address' => 'string',
            'more_info' => 'string',
            'budged' => 'string',
            'type' => 'string',
            'category_id' => 'integer',
            'subcategory_id' => 'integer',
            'taxpayer_office' => 'string',
            'TIN' => 'string',
            'profile_picture' => 'string',
        ];
    }
}