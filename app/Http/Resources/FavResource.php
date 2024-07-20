<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavResource extends JsonResource
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
            'Resturant Name' => $this->resturantName,
            'Resturant_Name' => $this->resturantName,
            'Resturant Address' => $this->resturantAdress,
            'Resturant_Address' => $this->resturantAdress,
            'product Name' => $this->productName,
            'product_Name' => $this->productName,
        ];
    }
}
