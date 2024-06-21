<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Helper\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Resources\AboutUsResourse;

class SettingController extends Controller
{
        public function aboutus() {
            $aboutus = Setting::orderby('created_at','desc')->first();
            return ApiResponse::sendresponse(200,"show about us",new AboutUsResourse($aboutus));
        }
}
