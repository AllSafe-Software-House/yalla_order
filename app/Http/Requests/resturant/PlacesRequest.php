<?php

namespace App\Http\Requests\resturant;

use Illuminate\Foundation\Http\FormRequest;

class PlacesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ["required","string" , "max:255"],
            'descrption' => ["required","string" , "max:255"],
            'starttime' => ["required"],
            'endtime' => ["required"],
            'address' => ["required","string"],
            'logo' => ["nullable"],
            'longitude' => ["nullable"],
            'latitude' => ["nullable"],
        ];
    }
}
