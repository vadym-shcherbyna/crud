<?php

namespace App\Http\Requests\Api\Items;

use App\Http\Requests\Api\AjaxRequest;

class ActivityRequest extends AjaxRequest
{
    /*
     * @return array
     */
    public function rules()
    {
        return [
            'is_active' => [
                'required',
                'boolean',
            ],
        ];
    }
}
