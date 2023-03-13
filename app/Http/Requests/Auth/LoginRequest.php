<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /*
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /*
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'max:255',
            ],
            'remember_me' => [
                'required',
                'in:0,1',
            ],
        ];
    }
}
