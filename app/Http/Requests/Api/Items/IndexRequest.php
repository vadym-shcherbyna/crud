<?php

namespace App\Http\Requests\Api\Items;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Item;

class IndexRequest extends FormRequest
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
            'per_page' => [
                'nullable',
                'integer',
                'in:10,50,100,200'
            ],
            'sort_dir' => [
                'nullable',
                'in:desc,asc',
            ],
            'sort_attr' => [
                'nullable',
                'in:' . implode(',', [
                    'name',
                    'category',
                    'address',
                    'created_at',
                ]),
            ],
            'name' => [
                'nullable',
            ],
            'address' => [
                'nullable',
            ],
            'is_active' => [
                'nullable',
                'in:0,1',
            ],
            'category' => [
                'nullable',
                'in:' . implode(',', \array_flip(Item::CATEGORIES)),
            ],
        ];
    }
}
