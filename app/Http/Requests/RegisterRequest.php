<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

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
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required|exists:roles,role_id'
        ];
    }

    public function setRedirector(Redirector $redirector)
    {
        $this->redirector = $redirector;

        $this->session()->flash('email', $this->email);
        $this->session()->flash('name', $this->name);

        return $this;
    }
}
