<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AjaxRequest extends FormRequest
{
    /*
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the failed validation response for the request.
     *
     * @param Validator $validator
     * @return HttpResponseException
     */
    protected function failedValidation(Validator $validator) : HttpResponseException
    {
        throw new HttpResponseException(response()->json(['errors'  => $validator->errors()], 422));
    }
}
