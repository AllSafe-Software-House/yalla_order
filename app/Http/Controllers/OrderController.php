<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Size;
use App\Models\Order;
use App\Models\Addons;
use App\Models\Menues;
use App\Models\Places;
use Nette\Utils\Random;
use App\Models\Products;
use App\Models\OrderTrake;
use App\Helper\ApiResponse;
use App\Models\Promo_Codes;
use Illuminate\Http\Request;
use App\Models\Reservationes;
use App\Models\GeneralSetting;
use App\Models\PaymentOperation;
use App\Notifications\Sendorder;
use App\Http\Resources\SizeResourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\OrderResource;
use App\Http\Resources\placesResource;
use App\Http\Resources\AddtionResourse;
use App\Http\Resources\MyOrderResource;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\ConfirmOrderRequest;
use App\Http\Resources\AddtionSauiResourse;
use App\Http\Resources\ReservationcardResource;
use App\Http\Resources\MyReservationcardResource;

class OrderController extends Controller
{
    public function showdetails($place_id, $product_id)
    {
        $resturant = Places::where('id', $place_id)->first();
        $sizes = Size::with('place')->where('places_id', $place_id)->where('menue_id',$product_id)->get();
        $additem = Addons::with('place')->where('type', 'item')->where('place_id', $place_id)->get();
        $addsaui = Addons::with('place')->where('type', 'sauci')->where('place_id', $place_id)->get();

        return  response()->json([
            'status' => 200,
            'message' => "show restaurantes",
            'data' => [
                'resturant' => new placesResource($resturant),
                'sizes' => SizeResourse::collection($sizes),
                'additem' => AddtionResourse::collection($additem),
                'addsaui' => AddtionSauiResourse::collection($addsaui)
            ]
        ], 200);
    }

    public function AddToCard(OrderRequest $request)
    {
        $user = Auth::user();
        $add = json_encode([$request->item, $request->sauce]);
        $menu = Menues::where('id', $request->product_id)->with('product')->first();
        $size = Size::where('id', $request->size_id)->first();
        $price = $size->price;
        $promocode = $request->promo_code_id;
        if ($add  != json_encode([null, null])) {
            $addtion = json_decode($add);
            $item = [];
            foreach ($addtion as $addonId) {
                if ($addonId == null) {
                    $item[] = 0;
                } else {
                    $addtionitem = Addons::where('id', $addonId)->first();
                    $item[] = $addtionitem->price;
                }
            }
            $totalitemprice = array_sum($item);
            $price = $price + $totalitemprice;
        }
        if ($promocode) {
            $promo_code_id = $promocode;
            $promocode = Promo_Codes::where('id', $promo_code_id)->first();
            $time = Carbon::today();
            $date = $time->format('Y-m-d');
            $timeckeck = $time->between($promocode->start, $promocode->end);
            if ($timeckeck) {
                $price = $price * ($promocode->sale / 100);
            } else {
                return ApiResponse::sendresponse(422, "this code is invaild");
            }
        } else {
            $promo_code_id = null;
        }


        // if ($request->use_wallet==1) {
        //     // Deduct wallet balance
        //     $amount_to_use = $request->amount_from_wallet;
        //     $user_wallet = $user->wallet;
        //     $user_wallet->withdraw($user->id, $walletAmount);
        // }


        $addtocard = Order::create([
            "Qty" =>  $request->qty,
            "user_id" => $user->id,
            "menue_id" =>  $request->product_id,
            "place_id" =>  $request->place_id,
            "size_id" =>  $request->size_id,
            "addanos" => $add,
            "address" => $user->address,
            "phone" => $user->phone,
            "price" => $price,
            "promo_code_id" => $promo_code_id,
            "numberOrder" => rand(1111111, 999999)

        ]);
        return ApiResponse::sendresponse(200, "add item to card", $addtocard);
    }

    public function showCard(Request $request)
    {
        $user = Auth::user();
        $type = $request->input('type');
        if ($type == 'clinic') {
            $showcard = Reservationes::where('user_id', $user->id)->where('status', "0")->with('place', 'doctore')->get();
            return ApiResponse::sendresponse(200, "show item in card", ReservationcardResource::collection($showcard));
        } elseif ($type == 'order') {
            $showcard = Order::where('user_id', $user->id)->where('status', "0")->with('place', 'menue', 'size', 'user')->get();
            return ApiResponse::sendresponse(200, "show item in card", OrderResource::collection($showcard));
        } else {
            return ApiResponse::sendresponse(401, "parameter notvalid");
        }
    }

    public function confirmorder($id, ConfirmOrderRequest  $request)
    {
        $order = Order::find($id);
        if (!$order) {
            return ApiResponse::sendresponse(401, "not in valid");
        }
        $order->specail_request = $request->specail_request;
        $order->delivery_method = $request->delivery_method;
        $delivery_method = $request->delivery_method;
        $place = Places::where('id',$order->place_id)->first();
        if ($request->pay_method == 'cash') {
            $order->pay_method = 'cash';
            $order->save();
            $this->statsorder($order, $delivery_method);
            $place->notify(new Sendorder($order));

            return ApiResponse::sendresponse(200, "cofirm order", $order);
        }elseif($request->pay_method == 'cashback_wallet'){
            if($order->status == '1'){
                return ApiResponse::sendresponse(401, "this order is already confirmed");
            }
            $order->pay_method = 'cashback wallet';
            $order->save();
            $this->statsorder($order, $delivery_method);
            $place->notify(new Sendorder($order));
            $use_cashback = $this->useCashback($order);

            if($use_cashback == 'false'){
                return ApiResponse::sendresponse(401, "there is no enough balance in wallet to use ");
            }
            $this->applyCashback($order);
            return ApiResponse::sendresponse(200, "cofirm order", $order);
        }else {
            $order->pay_method = "card";
            $order->save();
            $ordernum = $order->numberOrder;
            $iframe_link = $this->checkout($id);
            return ApiResponse::sendresponse(200, "show i frame payment", $iframe_link);
        }
    }




    public function statsorder($order, $delivery_method)
    {
        if ($delivery_method == 'delivery') {
            $places = Places::find($order->place_id);
            $order->delivery_fee = $places->delivery_fee;
        }
        $order->status = "1";
        $order->save();
        $menue = Menues::where('id', $order->menue_id)->first();
        $menue->count_selling = $menue->count_selling + 1;
        $menue->save();
        $trackorder = OrderTrake::create([
            'order_id' => $order->id,
            'accept_statue' => "1"
        ]);
    }

    public function myorder(Request $request)
    {
        $user = Auth::user();
        $type = $request->input('type');
        if ($type == 'clinic') {
            $showcard = Reservationes::where('user_id', $user->id)->where('status', "1")->with('place', 'doctore')->get();
            return ApiResponse::sendresponse(200, "show reservation in card", MyReservationcardResource::collection($showcard));
        } elseif ($type == 'order') {
            $showcard = Order::where('user_id', $user->id)->where('status', "1")->with('place', 'menue', 'size', 'user')->get();
            return ApiResponse::sendresponse(200, "show item in card", MyOrderResource::collection($showcard));
        } else {
            return ApiResponse::sendresponse(401, "parameter notvalid");
        }
    }

    public function deleteOrder($id)
    {
        $user = Auth::user();
        $showcard = Order::where('user_id', $user->id)->where('id', $id)->first();
        if (!$showcard) {
            return ApiResponse::sendresponse(404, "this prodcut not found");
        }
        $showcard->delete();
        return ApiResponse::sendresponse(200, "Delete order from card");
    }

    public function trackorder($order_id)
    {
        $order_trakes = OrderTrake::where('order_id', $order_id)->first();
        if ($order_trakes) {
            return ApiResponse::sendresponse(200, "Track this order", $order_trakes);
        } else {
            return ApiResponse::sendresponse(401, "this order not confirm yet");
        }
    }


    public function summary($id)
    {
        $order = Order::where('id', $id)->with('place')->first();
        if (!$order) {
            return ApiResponse::sendresponse(402, "this is invalid");
        }
        return ApiResponse::sendresponse(200, "show summary reservation", new OrderResource($order));
    }




    // payment function

    // order
    public function checkout($id)
    {
        $integration_id = env('Integration_id');
        $ifram_id = env('Iframe_id');
        $orderdetails = Order::find($id);
        $ordernum = $orderdetails->numberOrder;
        $tokenjsonresponse = $this->gettoken();
        if($orderdetails->payment_order_id == null){
            $order = $this->orderdata($integration_id, $ordernum, $ifram_id);
            $orderdetails->update(['payment_order_id'=>$order['id']]);
        }
        if($orderdetails->delivery_method == 'delivery'){
            $order_price_in_cents = ( $orderdetails->price + $orderdetails->place->delivery_fee ) * 100;
        }else{
            $order_price_in_cents = $orderdetails->price * 100;
        }
        $order_price_in_cents = $orderdetails->price * 100 ;
        return $datauser = $this->datauser($integration_id, $order_price_in_cents, $orderdetails->payment_order_id,$tokenjsonresponse);
         $responseArray = json_decode($datauser, true);
        return $clientSecret = $responseArray->original;
        return $this->getFinalUrl($datauser['original']['client_secret']);
        $iframe_link = 'https://accept.paymob.com/api/acceptance/iframes/' . $ifram_id . '?payment_token=' . $datauser['token'];
        // $iframe_link = 'https://accept.paymobsolutions.com/api/acceptance/iframes/' . $ifram_id . '?payment_token=' . $datauser['token'];
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
        $order = Order::where('numberOrder',$numberOrder)->first();
        if($order->delivery_method == 'delivery'){
            $totalprice = ( $order->price + $order->place->delivery_fee ) * 100;
        }else{
            $totalprice = $order->price * 100;
        }
        // $totalprice = $order->price;
        $tokenjson = $this->gettoken();
        $response_order = Http::withHeaders([
            "content-type" => 'application/json'
        ])
            // ->post("https://accept.paymob.com/api/ecommerce/payment-links",[
            ->post("https://accept.paymobsolutions.com/api/ecommerce/orders", [
                'auth_token' => $tokenjson['token'],
                "delivery_needed" => "false",
                "amount_cents" => $totalprice,
                "merchant_order_id" => $order->numberOrder
            ]);

        // return $response_order->object();

        $order_json = $response_order->json();
        return $order_json;
    }

    // step 3 get data user
    public function datauser($integration_id, $amount_cents, $order_id,$tokenjsonresponse)
    {
        // return $integration_id;
        $user = Auth::user();
        $name = $user->name;
        $secret_key = env('PAYMOB_SECRET_KEY');
        // check name to get lastname
        if ((count(explode(" ", $name)) == 1)) {
            $first_name = $name;
            $last_name = $name;
        } else {
            $first_name = explode(" ", $name)[0];
            $last_name = explode(" ", $name)[1];
        }
        // $response_user = Http::withHeaders([
        //     'content-type' => 'application/json'
        // ])->post('https://accept.paymobsolutions.com/api/acceptance/payment_keys', [
        //     "auth_token" => $tokenjsonresponse['token'],
        //     "expiration" => 36000,
        //     "amount_cents" => $amount_cents,
        //     "order_id" => $order_id,
        //     "billing_data" => [
        //         "first_name"            => $first_name,
        //         "last_name"             => $last_name,
        //         "phone_number"          => "NA",
        //         // "phone_number"          => $user->phone ?: "NA",
        //         "email"                 => $user->email,
        //         "apartment"             => "NA",
        //         "floor"                 => "NA",
        //         "street"                => "na",
        //         // "street"                => $user->address,
        //         "building"              => "NA",
        //         "shipping_method"       => "NA",
        //         // "postal_code"           => $user->postal_code,
        //         // "city"                  => $user->city,
        //         // "state"                 => $user->state ?: "NA",
        //         // "country"               => $user->country,
        //         "postal_code"           => "postal_code",
        //         "city"                  => "city",
        //         "state"                 =>  "NA",
        //         "country"               => "country",
        //     ],
        //     "currency" => "EGP",
        //     "integration_id" => $integration_id
        // ]);


        // $userdate_json = $response_user->json();
        // return $userdate_json;


        $url = 'https://accept.paymob.com/v1/intention/';
        $authToken = 'YOUR_AUTH_TOKEN'; // Replace with your actual auth token

        $headers = [
            'Authorization' => 'Token ' . $secret_key,
            'Content-Type' => 'application/json'
        ];

        $body = [
            "amount" => $amount_cents,
            "currency" => "EGP",
            "payment_methods" => [123,(int)$integration_id],
            "items" => [
                [
                    "name" => "Item name 1",
                    "amount" => $amount_cents,
                    "description" => "Item description 1",
                    "quantity" => 1
                ]
            ],
            "billing_data" => [
                "apartment" => "sympl",
                "first_name" => $first_name,
                "last_name" => $last_name,
                "street" => "NA",
                "building" => "NA",
                "phone_number" => "+201125773493",
                "city" => "NA",
                "country" => "EG",
                "email" => $user->email,
                "floor" => "NA",
                "state" => "NA"
            ],
            "customer" => [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $user->email,
                "extras" => [
                    "re" => "22"
                ]
            ],
            "extras" => [
                "ee" => 22
            ]
        ];

        $response = Http::withHeaders($headers)->post($url, $body);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json([
                'error' => 'Request failed',
                'status' => $response->status(),
                'body' => $response->body()
            ]);
        }

    }


    public function getFinalUrl($client_secret)
    {
        $public_key = env('PAYMOB_PUBLIC_KEY');
        $url = 'https://accept.paymob.com/unifiedcheckout/?publicKey='.$public_key.'&clientSecret='.$client_secret;
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

            $order = Order::where('payment_order_id',$request->order)->first();
            if($order){
                // Apply cashback
                $this->applyCashback($order);
            }

            $data = [
                "order id" => $request->merchant_order_id,
                "payment" => $payment_details,
            ];
            return ApiResponse::sendresponse(200, "done payment",$data);
        } else {
            return ApiResponse::sendresponse(404, "fail payment");
        }
    }



    public function applyCashback($order)
    {
        $enabled = GeneralSetting::where('key', 'cashback_enabled')->value('value');
        $amount = GeneralSetting::where('key', 'cashback_amount')->value('value');
        $percentage = GeneralSetting::where('key', 'cashback_percentage')->value('value');
        $limit = GeneralSetting::where('key', 'cashback_limit')->value('value');

        if (!$enabled) {
            return;
        }

        if($order->delivery_method == 'delivery'){
            $order_price = ( $order->price + $order->place->delivery_fee ) ;
        }else{
            $order_price = $order->price ;
        }

        if ($order_price < $limit) {
            return;
        }

        $cashbackAmount = 0;
        if ($amount > 0) {
            $cashbackAmount = $amount;
        } elseif ($percentage > 0) {
            $cashbackAmount = $order_price * ($percentage / 100);
        }

        // Apply cashback to user's wallet
        // $order->user->wallet->cashback($cashbackAmount, $order->id);

        // Log cashback transaction
        $order->user->walletTransactions()->create([
            'amount' => $cashbackAmount,
            'type' => 'cashback',
            'order_id'=>$order->id,
            // 'description' => "Cashback for order #{$order->id}",
        ]);
    }



    public function useCashback($order)
    {
        // Check if cashback is enabled
        $enabled = GeneralSetting::where('key', 'cashback_enabled')->value('value');
        if (!$enabled) {
            return false;
        }

        // Get cashback settings
        $amount = GeneralSetting::where('key', 'cashback_amount')->value('value');
        $percentage = GeneralSetting::where('key', 'cashback_percentage')->value('value');
        $limit = GeneralSetting::where('key', 'cashback_limit')->value('value');

        // Calculate order price considering delivery method
        if ($order->delivery_method == 'delivery') {
            $order_price = $order->price + $order->place->delivery_fee;
        } else {
            $order_price = $order->price;
        }

        // Check if the order price meets the cashback limit
        // if ($order_price < $limit) {
        //     return;
        // }

        // Calculate cashback amount
        // $cashbackAmount = 0;
        // if ($amount > 0) {
        //     $cashbackAmount = $amount;
        // } elseif ($percentage > 0) {
        //     $cashbackAmount = $order_price * ($percentage / 100);
        // }

        // Get user's cashback balance
        $user = $order->user;
        $wallet = $user->wallet;
        $walletBalance = $wallet->balance;
    //    return  array(['walletBalance'=>$walletBalance ,
    //         'order_price'=>$order_price
    //     ]);
        // Check if cashback balance is sufficient to cover the order price
        if ($walletBalance >= $order_price) {
            // Deduct the order price from the cashback balance
            $wallet->balance -= $order_price;
            // $order->total_paid_with_cashback = $order_price;
            $wallet->save();
            // return 'true';
        }else {
            // No cashback balance to use
            return 'false';
        }

        // Save the updated wallet balance
        // $wallet->save();

        // $order->user->wallet->withdraw($order_price, $order->id);

        // Log cashback transaction
        $user->walletTransactions()->create([
            'amount' => $order_price,
            'type' => 'withdraw',
            'order_id' => $order->id,
            // 'description' => "Cashback used for order #{$order->id}",
        ]);

        // Save the order with the applied cashback amount
        // $order->save();

        // Apply additional cashback amount to the wallet if applicable
        // if ($cashbackAmount > 0) {
        //     $wallet->balance += $cashbackAmount;
        //     $wallet->save();

        //     // Log the cashback earned transaction
        //     $user->walletTransactions()->create([
        //         'amount' => $cashbackAmount,
        //         'type' => 'cashback_earned',
        //         'order_id' => $order->id,
        //         'description' => "Cashback earned for order #{$order->id}",
        //     ]);
        // }
    }



}
