<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product name' => $this->product->name,
            'product_name' => $this->product->name,
            'product descrption' => $this->product->descrption,
            'product_descrption' => $this->product->descrption,
            'product price' => $this->product->price,
            'product_price' => $this->product->price,
            // 'product status fav' => $this->
        ];
    }
}
