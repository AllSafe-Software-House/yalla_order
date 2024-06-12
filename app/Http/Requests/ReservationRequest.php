<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'phone' => ["required","digits:11"],
            'gender'=> ["required","in:male,female"],
            'age'=>["required","integer"],
            'detection_type'=>["required","in:normal,urgent"],
            'detection_location'=>["required","in:home,clinic"],
            'day_booking'=>["required","date"],
            'time_booking'=>["required"],
            'doctore_id' =>["required","integer","exists:doctores,id"]
        ];
    }
}
