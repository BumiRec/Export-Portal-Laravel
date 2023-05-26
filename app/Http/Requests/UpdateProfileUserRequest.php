<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class UpdateProfileUserRequest extends FormRequest
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
            'name'         => ['required', 'max:255'],
            'surname'      => ['required', 'max:255'],
            'email'        => ['required', Rule::unique('users')->ignore($this->user)],
            'phone_number' => ['required', Rule::unique('users')->ignore($this->user)],
            'country_id'   => ['required', 'numeric'],
            'gender'       => ['required', 'max:255'],
        ];
    }
}
