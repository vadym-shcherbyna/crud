<?php

namespace App\Http\Resources;

use App\Models\Item;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => Item::CATEGORIES[$this->category],
            'address' => $this->address,
            'is_active' => $this->is_active,
            'notice' => $this->notice,
            'date' => [
                'date' => $this->date,
                'time' => $this->time,
            ],
        ];
    }
}
