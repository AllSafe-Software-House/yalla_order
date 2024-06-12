<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUSRequest extends FormRequest
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
            "fname" => ["required","string","max:255"],
            "lname" => ["nullable","string","max:255"],
            "email" => ["required","email"],
            "phone" => ["required","digits:11"],
            "message" => ["required","string"]
        ];
    }
}
