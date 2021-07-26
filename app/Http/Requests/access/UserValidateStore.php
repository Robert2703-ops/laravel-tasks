<?php

namespace App\Http\Requests\access;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateStore extends FormRequest
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
            'name' => "required|min:3|max:300",
            'email' => "required|unique:users",
            'password' => "required|min:4|max:50|confirmed"
        ];
    }
}
