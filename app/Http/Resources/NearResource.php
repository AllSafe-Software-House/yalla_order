<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NearResource extends JsonResource
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
            'name' => $this->name,
            "descrption" => $this->descrption,
            "starttime" => $this->starttime,
            "endtime" => $this->endtime,
            "address" => $this->address,
            "logo" => asset($this->logo),
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'type' => $this->type,
            'distance' => $this->distance,
        ];
    }
}
