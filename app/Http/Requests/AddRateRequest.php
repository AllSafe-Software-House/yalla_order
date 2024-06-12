<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRateRequest extends FormRequest
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
            "rate" => ["required","max:5"],
            "comment" => ["required","string","max:255"],
            "place_id" => ["required_without:doctore_id","integer","exists:places,id"],
            'doctore_id' => ["required_without:place_id" , "integer","exists:doctores,id"]
        ];
    }
}
