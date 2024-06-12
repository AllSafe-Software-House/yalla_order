<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function aboutus() {
        $aboutus = Setting::orderby('created_at','desc')->first();
        return ApiResponse::sendresponse(200,"show about us",$aboutus);
    }


}
