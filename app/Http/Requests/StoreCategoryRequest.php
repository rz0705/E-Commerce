<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        // dd(request()->all());
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Category name is required.',
            'name.max' => 'Category name must not exceed 255 characters.',
            'slug.required' => 'Slug is required.',
        ];
    }
}