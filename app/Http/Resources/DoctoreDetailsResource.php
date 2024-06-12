<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctoreDetailsResource extends JsonResource
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
            'id' =>$this->id,
            'image' => asset($this->image),
            'name' => $this->name,
            'department' => $this->department,
            'days' => json_decode($this->dayes),
            'start time' => $this->starttime,
            'end time' => $this->endtime,
            'detection time' => $this->time,
            'waiting time' => $this->wait,
            'fees'=>$this->price_fees,
            'Address clinic'=>$this->address,
            'clinic_id'=>$this->place_id,
            'overview' => $this->overview,
            'discount' => $this->sale

        ];
    }
}
