<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => ["required","string","max:255"],
            'department'  => ["required","string","max:255"],
            'place_id' => ["required","exists:places,id"],
            'starttime'=> ["required"],
            'endtime'=> ["required"],
            'time'=> ["required","integer"],
            'overview'=>["required","string","max:255"],
            'sale' => ["nullable","integer"]
        ];
    }
}
