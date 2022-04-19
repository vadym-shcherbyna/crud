<?php

namespace App\Http\Requests\Api\Items;

use App\Http\Requests\Api\AjaxRequest;
use App\Models\Item;

class BaseRequest extends AjaxRequest
{
    /*
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:191'
            ],
            'slug' => [
                'required',
                'string',
                'max:191'
            ],
            'category' => [
                'required',
                'in:' . implode(',', array_flip(Item::CATEGORIES)),
            ],
            'address' => [
                'required',
                'string',
                'max:191'
            ],
            'description' => [
                'required',
                'string',
            ],
            'notice' => [
                'nullable',
                'string',
                'max:191'
            ],
            'is_active' => [
                'boolean',
            ],
        ];
    }
}
