<?php

namespace App\Http\Requests\access;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateUpdatePassword extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'password' => "required|min:4|max:50",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Password is not an optional field",
            'name.min' => "Password length is too short",
            'name.max' => "Password length is too high"
        ];
    }
}
