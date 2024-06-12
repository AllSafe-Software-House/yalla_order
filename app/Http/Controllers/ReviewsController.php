<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Requests\AddRateRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    public function calcrate($user, $request)
    {
        $num = DB::table('reviews')->select('place_id')->where('user_id', $user->id)->where('place_id', $request->place_id)->groupBy('place_id')->count();
        $sum = DB::table('reviews')->select('place_id')->where('user_id', $user->id)->where('place_id', $request->place_id)->groupBy('place_id')->sum('rate_num');
        $totalrate = $sum / $num;
        $revrate = Reviews::where('place_id', $request->place_id)->get();
        foreach ($revrate as $revrate) {
            $revrate->rate_num = $totalrate;
            $revrate->save();
        }
    }
    public function addrate(AddRateRequest $request)
    {
        $user = Auth::user();
        $revrate = Reviews::where('place_id', $request->place_id)->exists();
        if ($revrate) {
            $revrate = Reviews::where('place_id', $request->place_id)->orderBy('created_at', 'desc')->first();
            $rate = Reviews::create([
                "user_id" => $user->id,
                "place_id" => $request->place_id,
                'rate_num' => $request->rate,
                "comment" => $request->comment,
            ]);
            $this->calcrate($user, $request);
        } else {
            $rate = Reviews::create([
                "user_id" => $user->id,
                "place_id" => $request->place_id,
                "rate_num" => $request->rate,
                "comment" => $request->comment,
            ]);
        }

        return ApiResponse::sendresponse(200, "add review", $rate);
    }


    public function showrate($place_id)
    {
        $user = Auth::user();
        $check = Reviews::where('place_id', $place_id)->with('place', 'user')->exists();
        if (!$check) {
            return ApiResponse::sendresponse(401, "this not invalid");
        }
        $review = Reviews::where('place_id', $place_id)->with('place', 'user')->get();
        return ApiResponse::sendresponse(200, "show review", ReviewResource::collection($review));
    }


    public function addratedoctor(AddRateRequest $request)
    {
        $user = Auth::user();

        $revrate = Reviews::where('place_id', $request->place_id)->exists();
        if ($revrate) {
            $revrate = Reviews::where('place_id', $request->place_id)->orderBy('created_at', 'desc')->first();
            $rate = Reviews::create([
                "user_id" => $user->id,
                "doctore_id" => $request->doctore_id,
                "rate_num" => $request->rate,
                "comment" => $request->comment,
            ]);
            $this->calcrate($user, $request);
        } else {
            $rate = Reviews::create([
                "user_id" => $user->id,
                "doctore_id" => $request->doctore_id,
                "rate_num" => $request->rate,
                "comment" => $request->comment,
            ]);
        }

        return ApiResponse::sendresponse(200, "add review", $rate);
    }


    public function showratedoctor($doctor_id)
    {
        $user = Auth::user();
        $review = Reviews::where('doctore_id', $doctor_id)->with('doctor', 'user')->get();
        return ApiResponse::sendresponse(200, "show review", ReviewResource::collection($review));
    }
}
