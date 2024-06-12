<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoCodeRequest extends FormRequest
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
            'place_id' => ["required","exists:places,id"],
            'name' => ["required","string"],
            'sale' => ["required","integer"],
            'starttime' => ["required","date"],
            'endtime'=> ["required","date"]
        ];
    }
}
