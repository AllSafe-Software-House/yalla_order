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
use App\Models\PaymentOperation;
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
        $sizes = Size::with('place')->where('places_id', $place_id)->get();
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
        if ($request->pay_method == 'cash') {
            $order->pay_method = 'cash';
            $order->save();
            $this->statsorder($order, $delivery_method);
            return ApiResponse::sendresponse(200, "cofirm order", $order);
        } else {
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
        $order = Order::where('numberOrder',$numberOrder)->first();
        $totalprice = $order->price;
        $tokenjson = $this->gettoken();
        $response_order = Http::withHeaders([
            "content-type" => 'application/json'
        ])
            // ->post("https://accept.paymob.com/api/ecommerce/payment-links",[
            ->post("https://accept.paymobsolutions.com/api/ecommerce/orders", [
                'auth_token' => $tokenjson['token'],
                "delivery_needed" => "false",
                "amount_cents" => $totalprice * 100,
                "merchant_order_id" => $order->numberOrder
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

    public function sucess()
    {
        return 5;
    }

    public function fail()
    {
        return 4;
    }
}
