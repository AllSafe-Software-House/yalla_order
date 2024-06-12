<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'detection time' => $this->doctore->time,
            'waiting time' => $this->doctore->wait,
            "clinic Address" => $this->place->address,
            "patient name" => $this->name,
            "patient phone" => $this->phone,
            "patient gender" => $this->gender,
            "patient age" => $this->age,
            "patient day_booking" => $this->day_booking,
            "patient time_booking" => $this->time_booking,
            "total price" => $this->totalAfterSale
        ];
    }
}
