<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'gender_id' => 'required',
            'person_status_id' => 'required',
            'parent_info_id' => 'required',
            'birthday' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'description' => 'required',
        ];
    }
}
