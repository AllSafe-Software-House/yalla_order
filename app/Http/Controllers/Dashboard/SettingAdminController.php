<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingAdminController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:updateAboutUS',['only'=>['aboutus' , 'aboutusupdate']]);
    // }

    public function aboutus()  {
        $aboutus = Setting::orderby('created_at','desc')->first();
        return view('Setting.AboutUs' , compact('aboutus'));
    }

    public function aboutusupdate(Request $request)  {
        $aboutus = Setting::create([
            'title' => $request->title ,
            'text' => $request->text
        ]) ;

        return redirect()->back()->with('done',"update data sucessful");
    }
}
