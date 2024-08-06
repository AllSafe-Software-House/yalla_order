<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmOrderRequest extends FormRequest
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
            "specail_request" => ["nullable","string"],
            "delivery_method" => ["required","string","in:delivery,onsite"],
            "pay_method" => ["required","in:card,cashback_wallet"]
        ];
    }
}
