<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'Order Id' => $this->id,
            'User Address' => $this->user->address,
            'Resturant id' => $this->place->id,
            'Resturantid' => $this->place->id,
            'Resturant Name' => $this->place->name,
            'ResturantName' => $this->place->name,
            'ResturantAddress' => $this->place->address,
            'Resturant Address' => $this->place->address,
            'Resturant_image' => asset($this->place->logo),
            'Delivery Fee' => $this->place->delivery_fee,
            'DeliveryFee' => $this->place->delivery_fee,
            'ProductName' => $this->menue->product->name,
            'Product Name' => $this->menue->product->name,
            'Product_image' => asset($this->menue->product->image),
            'Order QTY' => $this->Qty,
            'OrderQTY' => $this->Qty,
            'Total' =>$this->price,
            'Size' => $this->size->size
        ];
    }
}
