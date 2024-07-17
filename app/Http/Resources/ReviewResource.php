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
            "username" => $this->user->name ,
            "user name" => $this->user->name ,
            "AvrageRate" => $this->rate_num ,
            "Avrage Rate" => $this->rate_num ,
            "usercomment" => $this->comment ,
            "user comment" => $this->comment ,
            "userratetime" => Carbon::parse($this->created_at)->format('Y-m-d') ,
            "user rate time" => Carbon::parse($this->created_at)->format('Y-m-d') ,
        ];
    }
}
