<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'         => 'required|string|max:255',
            'surname'      => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:8',
            'phone_number' => 'required|string|max:255|unique:users,phone_number',
            'country_id'   => 'required|integer',
            'gender'       => 'required|string|max:255',
            'agreements'   => 'required|boolean:true,false',
            'type'         => 'required|string|max:255',
        ];
    }
}
