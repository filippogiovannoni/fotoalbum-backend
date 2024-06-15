<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
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
            'title' => 'required|unique:photos,title|max:50',
            'description' => 'nullable',
            'image_url' => 'required|image|max:100|mimes:png,jpg,jpeg',
            'featured' => 'boolean|nullable',
            'category_id' => 'nullable|exists:categories,id'
        ];
    }
}
