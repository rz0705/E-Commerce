<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
        // dd(request()->all());
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string|min:5',
            'status' => 'required|in:1,0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must not exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'email.max' => 'The email field must not exceed 255 characters.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'address.max' => 'The address field must not exceed 255 characters.',
            'city.max' => 'The city field must not exceed 255 characters.',
            'state.max' => 'The state field must not exceed 255 characters.',
            'zip_code.max' => 'The zip code field must not exceed 10 characters.',
            'status.required' => 'The status field is required.',
            'status.in' => 'Invalid status value. It should be either active or inactive.',
        ];
    }
}
