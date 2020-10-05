<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function setRedirector(Redirector $redirector)
    {
        $this->redirector = $redirector;

        $this->session()->flash('email', $this->email);

        return $this;
    }
}
