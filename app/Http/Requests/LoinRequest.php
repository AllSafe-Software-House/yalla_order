<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoinRequest extends FormRequest
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
            'email' => ["required_if:phone,null", 'string', 'email'],
            'phone' => ["required_if:email,null", "digits:11"],
            'password' => ["required", "string", "min:6"]
        ];
    }
}
