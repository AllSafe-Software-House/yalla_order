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

    public function aboutusstore(Request $request)  {
        $aboutus = Setting::create([
            'title' => [
                "en" => $request->title,
                "ar" => $request->title_ar,
            ] ,
            'text' => [
                "en" => $request->text,
                "ar" => $request->text_ar,
            ]
        ]) ;

        return redirect()->back()->with('done',"update data sucessful");
    }
    public function aboutusupdate(Request $request)  {
        $aboutus = Setting::first();
            $aboutus->title = [
                "en" => $request->title,
                "ar" => $request->title_ar,
            ] ;
            $aboutus->text = [
                "en" => $request->text,
                "ar" => $request->text_ar,
            ];
            $aboutus->save();
        return redirect()->back()->with('done',"update data sucessful");
    }
}
