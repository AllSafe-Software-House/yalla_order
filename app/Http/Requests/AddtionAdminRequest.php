<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddtionAdminRequest extends FormRequest
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
            'price' => ["required"],
            'type' => ["required","in:item,sauci"],
            'place_id' => ["required","integer","exists:places,id"]
        ];
    }
}
