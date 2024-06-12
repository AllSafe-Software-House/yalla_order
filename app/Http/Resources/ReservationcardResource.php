<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationcardResource extends JsonResource
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
            "reservation id" => $this->id,
            "clinic name" => $this->place->name,
            "Doctore name" => $this->doctore->name,
            'department' => $this->doctore->department,
            "patient day_booking" => $this->day_booking,
            "patient time_booking" => $this->time_booking,
            "total price" => $this->totalAfterSale
        ];
    }
}
