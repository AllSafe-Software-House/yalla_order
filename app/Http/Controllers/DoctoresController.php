<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Resources\DoctoreDetailsResource;
use App\Http\Resources\ReviewResource;
use App\Models\Doctores;
use App\Models\Favorites;
use App\Models\Places;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctoresController extends Controller
{
    public function show($id){
        $user = Auth::user() ;
        // $doctor = DB::table('doctores')->join('places','doctores.place_id','places.id')
        // ->select('doctores.*','places.address as address')
        // ->where('doctores.id',$id)
        // ->first();
        $doctor = Doctores::with('clinic')
        ->where('doctores.id',$id)
        ->first();
        $review = Reviews::where('doctore_id',$doctor->id)->with('doctor','user')->get();
        if(Auth::check()){
            $check = Favorites::where('user_id',$user->id)->where('doctore_id',$id)->exists();
        }else{
            $check = Favorites::where('doctore_id',$id)->exists();
        }
        $totalrate = Reviews::where('doctore_id',$id)->first();
        if(!$totalrate){
            $rate = 0;
        }else{
            $rate = $totalrate->rate_num;
        }
        if(!$doctor){
            return ApiResponse::sendresponse(404,"This doctor not found") ;

        }
        if($check){
            $doctorsstatusfav = true ;
        }else{
            $doctorsstatusfav = false ;
        }
        return ApiResponse::sendresponse(200,"show details doctors", [
            "Total rate" => $rate,
            "Totalrate" => $rate,
            "Doctor details" => new DoctoreDetailsResource($doctor),
            "Doctordetails" => new DoctoreDetailsResource($doctor),
            "reviwes" =>ReviewResource::collection($review),
            "fav"=>$doctorsstatusfav
        ]) ;
    }

    public function listdiscount(){
        $doctor = Doctores::where('sale','>',0)->get();
        if(!$doctor){
            return ApiResponse::sendresponse(401,"bot valid") ;
        }
        return ApiResponse::sendresponse(200,"show details doctors",DoctoreDetailsResource::collection($doctor)) ;
    }

}
