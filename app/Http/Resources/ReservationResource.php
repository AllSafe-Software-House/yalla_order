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
            "reservationid" => $this->id,
            "clinicname" => $this->place->name,
            "clinic name" => $this->place->name,
            "Doctorename" => $this->doctore->name,
            "Doctore name" => $this->doctore->name,
            'department' => $this->doctore->department,
            'detectiontime' => $this->doctore->time,
            'detection time' => $this->doctore->time,
            'waitingtime' => $this->doctore->wait,
            'waiting time' => $this->doctore->wait,
            "clinicAddress" => $this->place->address,
            "clinic Address" => $this->place->address,
            "patientname" => $this->name,
            "patient name" => $this->name,
            "patientphone" => $this->phone,
            "patient phone" => $this->phone,
            "patientgender" => $this->gender,
            "patient gender" => $this->gender,
            "patientage" => $this->age,
            "patient age" => $this->age,
            "patientday_booking" => $this->day_booking,
            "patient day_booking" => $this->day_booking,
            "patienttime_booking" => $this->time_booking,
            "patient time_booking" => $this->time_booking,
            "totalprice" => $this->totalAfterSale,
            "total price" => $this->totalAfterSale,
        ];
    }
}
