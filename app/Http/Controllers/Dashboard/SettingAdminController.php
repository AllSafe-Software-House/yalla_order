<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Models\GeneralInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


    // general info
    public function generalinfo(){
        $generinfo = GeneralInfo::first();
        return view('Setting.GeneralInfo',compact('generinfo'));
    }

    public function generalinfostore(Request $request){
        $nameimage = $request->logo;
        if (isset($nameimage)) {
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Logo/$image";
            $request->logo->move(public_path('uploads/Logo'), $image);
        } else {
            $imagepath = "uploads/Logo/defultfood.png";
        }
        GeneralInfo::create([
            'name' => $request->name,
            'logo' => $imagepath,
            'linkAppStore' => $request->linkAppStore,
            'linkPlayStore' => $request->linkPlayStore,
        ]);
        return redirect()->back()->with('done',"add data sucessful");
    }

    public function generalinfoupdate(Request $request){
        $generinfo = GeneralInfo::first();
        $nameimage = $request->logo;
        if (isset($nameimage)) {
            $image = time(). '.'. $request->logo->extension();
            $imagepath =  "uploads/Logo/$image";
            $request->logo->move(public_path('uploads/Logo'), $image);
        } else {
            $imagepath = $generinfo->logo;
        }
        $generinfo->name = $request->name;
        $generinfo->logo = $imagepath;
        $generinfo->linkAppStore = $request->linkAppStore;
        $generinfo->linkPlayStore = $request->linkPlayStore;
        $generinfo->save();
        return redirect()->back()->with('done',"update data sucessful");
    }
}
