<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MyOrderResource extends JsonResource
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
            'Resturant Name' => $this->place->name,
            'ResturantName' => $this->place->name,
            'Resturant ID' => $this->place->id,
            'Resturant_image' => asset($this->place->logo),
            'Resturant Address' => $this->place->address,
            'ResturantAddress' => $this->place->address,
            'ProductName' => $this->menue->product->name,
            'Product Name' => $this->menue->product->name,
            'Delivery Fee' => $this->place->delivery_fee,
            'DeliveryFee' => $this->place->delivery_fee,
            'menu id' => $this->menue->id,
            'menuid' => $this->menue->id,
            'menu_image' => asset($this->menue->product->image),
            'Price' =>$this->price,
            'Total' => $this->price + $this->place->delivery_fee,
            'Date' => Carbon::parse($this->created_at)->format('Y-m-d')
        ];
    }
}
