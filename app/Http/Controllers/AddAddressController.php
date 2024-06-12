<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Requests\ADDAdressRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddAddressController extends Controller
{
    public function addaddress(ADDAdressRequest $request)  {
        $user = Auth::user();
        $address = User::where('id',$user->id)->first();
        $address->address = $request->address;
        $address->save();

        return ApiResponse::sendresponse(200,"add address sucessful",$address);
    }
}
