<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            "id" => $this->id,
            "user name" => $this->user->name ,
            "Avrage Rate" => $this->rate_num ,
            "user comment" => $this->comment ,
            "user rate time" => Carbon::parse($this->created_at)->format('Y-m-d') ,
        ];
    }
}
