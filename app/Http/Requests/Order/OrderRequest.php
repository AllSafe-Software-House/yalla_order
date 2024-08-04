<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            "qty" =>["required","integer"],
            "product_id" => ["required","integer","exists:menues,id"],
            "place_id" => ["required","integer","exists:places,id"],
            "size_id" => ["required","integer","exists:sizes,id"],
            "item" => ["nullable","exists:addons,id"],
            "sauce"=> ["nullable","exists:addons,id"],
            "promo_code_id" =>["nullable","exists:promo_codes,id"],
            // "use_wallet"=>["nullable","in:0,1"],
            // "amount_from_wallet"=>["nullable","integer"],
        ];
    }
}
