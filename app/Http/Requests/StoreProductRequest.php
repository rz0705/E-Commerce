<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'image_path' => 'required',
            'price' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product name is required.',
            'name.max' => 'Product name must not exceed 255 characters.',
            'slug.required' => 'Slug is required.',
            'description.required' => 'Description is required.',
            'description.max' => 'Description must not exceed 255 characters.',
            'image_path.required' => 'Image path is required.',
            'price.required' => 'Price is required.',
        ];
    }
}
