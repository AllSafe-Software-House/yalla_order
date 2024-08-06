<?php

namespace App\Http\Controllers\Auth;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoinRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Order;
use App\Models\User;
use App\Notifications\VerificationEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Whoops\Handler\PlainTextHandler;

use function PHPUnit\Framework\returnSelf;

class AuthUserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);
        $token = $user->createToken($user->name . '@allsafe')->plainTextToken;
        $user->wallet()->create(['balance'=>0]);
        return ApiResponse::sendresponse(200, "register sucess", $token);
    }


    public function login(LoinRequest $request)
    {
        if(isset($request->email)){
            $user = User::where('email',  $request->email)->first();
        }else{
            $user = User::where('phone',  $request->phone)->first();
        }
        if (!$user || !Hash::check($request->password, $user->password)) {
            return ApiResponse::sendresponse(422, "Username or password incorrect");
        }
        $user->tokens()->delete();
        $token = $user->createToken($user->name . '@allsafe')->plainTextToken;
        return ApiResponse::sendresponse(200, "login sucess", $token);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::sendresponse(200, "logout sucess");
    }

    public function forgetpassword(Request $request)
    {
        $user = User::where('email',  $request->email)->first();
        $user->notify(new VerificationEmailNotification());

        return ApiResponse::sendresponse(200, "check your email");
    }

    public function showprofile() {
        $user = Auth::user();
        return ApiResponse::sendresponse(200, "show profile" ,$user );
    }

    public function editprofile(ProfileRequest $request) {
        $user = Auth::user();
        $userprofile = User::where('id',$user->id)->first();
        if(isset($request->name)){
            $userprofile->name = $request->name;
        }else{
            $userprofile->name = $user->name;
        }
        $userprofile->phone = $request->phone;
        $userprofile->save();
        return ApiResponse::sendresponse(200, "show profile" ,$userprofile );
    }


    public function delete(){
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->get();
        foreach($order as $order){
            $order->delete();
        }
        $user->delete();
        return ApiResponse::sendresponse(200, "delete sucess");
    }



    public function userTransactions(){
        $user = Auth::user();
        // return $user;
        $transactions = $user->walletTransactions;
        return ApiResponse::sendresponse(200, "show transactions" ,$transactions );
    }

    public function userBalance(){
        $user = Auth::user();
        // return $user;
        if(!$user->wallet){
            $user->wallet()->create(['balance'=>0]);
        }
        $balance = $user->wallet?$user->wallet->balance:0;
        return ApiResponse::sendresponse(200, "show balance" ,$balance );
    }

}
