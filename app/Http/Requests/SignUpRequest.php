<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['required', 'max:20'],
            'password' => ['required', 'string', 'min:6', 'max:30', 'confirmed'],

        ];
    }
}
