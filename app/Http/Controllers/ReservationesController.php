<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Doctores;
use App\Models\Places;
use App\Models\Promo_Codes;
use App\Models\Reservationes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class ReservationesController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $user = Auth::user();
        $checkplace = Places::where('id',$request->place_id)->first();
        if(!$checkplace){
            return ApiResponse::sendresponse(401,"this clinic notvaild") ;
        }
        if($checkplace->type != "clinic"){
            return ApiResponse::sendresponse(401,"this clinic notvaild") ;

        }
        $doctor = Doctores::where('id',$request->doctore_id)->first();
        $reservation = Reservationes::create([
            'name' => $request->name,
            'phone'=> $request->phone,
            'gender'=> $request->gender,
            'age'=> $request->age,
            'detection_type'=> $request->detection_type,
            'detection_location'=> $request->detection_location,
            'day_booking'=> $request->day_booking,
            'time_booking'=> $request->time_booking,
            'doctore_id' => $request->doctore_id,
            'place_id' => $request->place_id,
            'user_id' => $user->id,
            'totalAfterSale' => $doctor->price_fees ,
            'reservationNumber' => rand(1111111, 999999),
        ]);
        return ApiResponse::sendresponse(200,"send reservation",$reservation) ;
    }


    public function summaryReservatin($id)  {
        $reservation = Reservationes::where('id',$id)->with('doctore','clinic')->first();
        if(!$reservation){
            return ApiResponse::sendresponse(402,"this is invalid") ;
        }
        return ApiResponse::sendresponse(200,"show summary reservation", new ReservationResource($reservation)) ;
    }


    public function calccode(Request $request)  {
        $reservation = Reservationes::where('id', $request->id)->first();
        $getfees = Doctores::where('id',$reservation->doctore_id)->first();
        $code = $request->code;
        $time = date('Y-m-d', strtotime(now()));
        $checkcode = Promo_Codes::where('name',$code)->exists();
        if(!$reservation){
            return ApiResponse::sendresponse(402,"this is invalid") ;
        }
        if(!$checkcode){
            return ApiResponse::sendresponse(402,"this code is invalid") ;
        }else{
            $checkcode = Promo_Codes::where('name',$code)
            ->where('type','clinic')
            ->where(function ($query) use ($time) {
                $query->whereDate('start', '<=', $time)
                      ->whereDate('end', '>=', $time);
            })
            ->exists();
            if(!$checkcode){
                $reservation->totalAfterSale = $getfees->price_fees;
                $reservation->save();
                return ApiResponse::sendresponse(402,"this code is end") ;
            }else{
                $promo = Promo_Codes::where('name',$code)->first();
                $sale = $getfees->price_fees * ($promo->sale/100);
                $reservation->code = $code;
                $reservation->totalAfterSale = $getfees->price_fees - $sale;
                $reservation->save();
                return ApiResponse::sendresponse(200,"code sucessfull", new ReservationResource($reservation)) ;
            }
        }
    }


    public function confirmresevation($id) {
        $reservationes = Reservationes::find($id);
        if (!$reservationes) {
            return ApiResponse::sendresponse(401, "not in valid");
        }
        $ordernum = $reservationes->reservationNumber;
        $iframe_link = $this->checkout($id);
        $reservationes->status = "1";
        $reservationes->save();
        return ApiResponse::sendresponse(200, "show i frame payment", $iframe_link);
    }
    
    public function checkout($id)
    {
        $integration_id = env('Integration_id');
        $ifram_id = env('Iframe_id');
        $reservation = Reservationes::find($id);
        $ordernum = $reservation->reservationNumber;
        $tokenjsonresponse = $this->gettoken();
        $order = $this->orderdata($integration_id, $ordernum, $ifram_id);
        $datauser = $this->datauser($integration_id, $order['amount_cents'], $order['id'],$tokenjsonresponse);
        $iframe_link = 'https://accept.paymobsolutions.com/api/acceptance/iframes/' . $ifram_id . '?payment_token=' . $datauser['token'];
        return $iframe_link;

    }

    // step 1 login in paymob
    public function gettoken()
    {
        $user = Auth::user();
        $getauth = Http::withHeaders([
            "content-type" => 'application/json'
        ])
            ->post("https://accept.paymob.com/api/auth/tokens", [
                'api_key' => env('Api_key'),
            ]);
            $getauth_json = $getauth->json();
            return $getauth_json;
    }
    // step 2 get data orsder
    public function orderdata($integration_id, $numberOrder, $ifram_id)
    {
        $order = Reservationes::where('reservationNumber',$numberOrder)->first();
        $totalprice = $order->totalAfterSale;
        $tokenjson = $this->gettoken();
        $response_order = Http::withHeaders([
            "content-type" => 'application/json'
        ])
            // ->post("https://accept.paymob.com/api/ecommerce/payment-links",[
            ->post("https://accept.paymobsolutions.com/api/ecommerce/orders", [
                'auth_token' => $tokenjson['token'],
                "delivery_needed" => "false",
                "amount_cents" => $totalprice * 100,
                "merchant_order_id" => $order->reservationNumber
            ]);
        $order_json = $response_order->json();
        return $order_json;
    }

    // step 3 get data user
    public function datauser($integration_id, $amount_cents, $order_id,$tokenjsonresponse)
    {
        $user = Auth::user();
        $name = $user->name;
        // check name to get lastname
        if ((count(explode(" ", $name)) == 1)) {
            $first_name = $name;
            $last_name = $name;
        } else {
            $first_name = explode(" ", $name)[0];
            $last_name = explode(" ", $name)[1];
        }
        $response_user = Http::withHeaders([
            'content-type' => 'application/json'
        ])->post('https://accept.paymobsolutions.com/api/acceptance/payment_keys', [
            "auth_token" => $tokenjsonresponse['token'],
            "expiration" => 36000,
            "amount_cents" => $amount_cents,
            "order_id" => $order_id,
            "billing_data" => [
                "first_name"            => $first_name,
                "last_name"             => $last_name,
                "phone_number"          => "NA",
                // "phone_number"          => $user->phone ?: "NA",
                "email"                 => $user->email,
                "apartment"             => "NA",
                "floor"                 => "NA",
                "street"                => "na",
                // "street"                => $user->address,
                "building"              => "NA",
                "shipping_method"       => "NA",
                // "postal_code"           => $user->postal_code,
                // "city"                  => $user->city,
                // "state"                 => $user->state ?: "NA",
                // "country"               => $user->country,
                "postal_code"           => "postal_code",
                "city"                  => "city",
                "state"                 =>  "NA",
                "country"               => "country",
            ],
            "currency" => "EGP",
            "integration_id" => $integration_id
        ]);


        $userdate_json = $response_user->json();
        return $userdate_json;
    }
    
     public function callback(Request $request)
    {
        $user = Auth::user();
        $payment_details = json_encode($request->all());
        if ($request->success === "true") {
            $operation = PaymentOperation::create([
                'user_id' => $user->id,
                'order_id' => $request->merchant_order_id,
                'status' => '1'
            ]);
            $data = [
                "order id" => $request->merchant_order_id,
                "payment" => $payment_details,
            ];
            return ApiResponse::sendresponse(200, "done payment",$data);
        } else {
            return ApiResponse::sendresponse(404, "fail payment");
        }
    }

}
