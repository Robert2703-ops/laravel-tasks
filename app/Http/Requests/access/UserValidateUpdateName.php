<?php

namespace App\Http\Requests\access;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateUpdateName extends FormRequest
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
            'name' => "required|min:4|max:300",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Name is not an optional field",
            'name.min' => "Name length is too short",
            'name.max' => "Name length is too high"
        ];
    }
}
