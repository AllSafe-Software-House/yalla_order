<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSaleResource extends JsonResource
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
            'id' => $this->product->id,
            'ProductName' => $this->product->name,
            'Product Name' => $this->product->name,
            'menue id' => $this->id,
            'menueid' => $this->id,
            'Product Sale' => $this->sale,
            'ProductSale' => $this->sale,
            'Resturant id' => $this->place->id,
            'Resturantid' => $this->place->id,
            'Resturant Name' => $this->place->name,
            'ResturantName' => $this->place->name,
        ];
    }
}
