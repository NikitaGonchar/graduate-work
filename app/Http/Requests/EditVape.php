<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditVape extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:1', 'max:255'],
            'description' => ['min:5'],
            'contacts' => ['required', 'min:1', 'max:255'],
            'image' => ['required'],
            'price' => ['required', 'numeric', 'min:1'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['required', 'exists:categories,id'],
            'brands' => ['required', 'array', 'min:1'],
            'brands.*' => ['required', 'exists:brands,id'],
        ];
    }
}
