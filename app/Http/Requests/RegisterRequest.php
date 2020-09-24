<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'role_id' => 'required|exists:roles,role_id'
        ];
    }

    public function messages()
    {
        return [
//            'role_id.exists' => 'role_id not found!'
        ];
    }
}
