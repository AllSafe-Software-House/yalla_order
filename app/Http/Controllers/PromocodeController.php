<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Models\Places;
use App\Models\Promo_Codes;
use App\Models\UserPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromocodeController extends Controller
{
    public function promocode(Request $request)
    {
        if($request->input('type') == 'clinic'){
            $places = Places::where('type', 'clinic')->get();
        }else{
            $places = Places::where('type', 'restaurantes')->get();
        }
        $result = [];
        foreach ($places as $data) {
            $promocodeExists = Promo_Codes::where('place_id', $data->id)->exists();
            $promocodeall = Promo_Codes::where('place_id', $data->id)->get();
            $status = $promocodeExists ? "ON" : "OFF";
            $placeData = [
                'id' => $data->id,
                'name' =>$data->name,
                'logo' => asset($data->logo),
                'status' => $status,
                'promo code id' => $promocodeExists ? $promocodeall->pluck('id')->first() : null,
                'promocodeid' => $promocodeExists ? $promocodeall->pluck('id')->first() : null,
                'promocodename' => $promocodeExists ? $promocodeall->pluck('name')->first() : null,
                'promo code name' => $promocodeExists ? $promocodeall->pluck('name')->first() : null,
            ];
            $result[] = $placeData;
        }
        return ApiResponse::sendresponse(200, "show procode", $result);
    }


    public function storepromocode($promo_id)
    {
        $user = Auth::user();
        $promocode = Promo_Codes::where('id', $promo_id)->exists();
        if($promocode){
            $storeuser = UserPromo::create([
                'user_id' => $user->id,
                'promo_code_id' => $promo_id ,
                'status' => "0"
            ]);
            return ApiResponse::sendresponse(200, "store promocode for user", $storeuser);
        }else{
            return ApiResponse::sendresponse(422, "invalid promocode");
        }

    }

}
