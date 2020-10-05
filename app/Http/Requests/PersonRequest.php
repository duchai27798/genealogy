<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

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
            'birthday' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'description' => 'required',
        ];
    }

    public function setRedirector(Redirector $redirector)
    {
        $this->redirector = $redirector;

        $this->session()->flash('cache', $this->all());

        return $this;
    }
}
