<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|unique:users|string',
            'phone_number' => 'required|unique:users|string|max:16|regex:/\+\d*/',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'A username is required',
            'username.unique:users' => 'Username is already taken',
            'phone_number.required' => 'A phone number is required',
            'phone_number.unique:users' => 'Phone number is already used',
            'phone_number.max:16' => 'Too long phone number'
        ];
    }
}
