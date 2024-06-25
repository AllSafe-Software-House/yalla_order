<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use Carbon\CarbonPeriod;
use App\Models\Landingpage;
use Illuminate\Http\Request;
use App\Models\ResturantRequest;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartorderController;
use App\Http\Controllers\ChartsubsribtionclinicController;
use App\Http\Controllers\ChartsubsribtionresturantController;


class HomeController extends Controller
{


    public function landingPage(){

        $partone = Landingpage::where('name','PartOne')->first();
        return view('front.index',compact('partone'));
            // return view('landing-page');
    }


    public function doctorLandingPage(){

        return view('front.doctors-landing');
            // return view('landing-page');
    }


    public function partenerForm(){

        return view('front.partener-form');
            // return view('landing-page');
    }


    public function contactUsForm(){

        return view('front.contact-us');
    }

    public function CommenQuestionPage(){

            return view('commanquesion');
    }
    public function TermsPage(){

            return view('terms');
    }

    public function store_resturants_requests(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            // 'name' => 'required|string|max:255',
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'business_type' => 'required|string'
        ]);

        // Process the validated data

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $full_name = $f_name . $l_name;
        $resturant_request = ResturantRequest::create(['name'=>$full_name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'type'=>$request->business_type]);

        return response()->json(['success' => true]);
    }


    public function store_contact_us(Request $request){
        // return $request->all();
        $validated = $request->validate([
            // 'name' => 'required|string|max:255',
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'message' => 'required|string|min:5'
        ]);

        // Process the validated data

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $full_name = $f_name . $l_name;
        // $contact_us = ResturantRequest::create(['name'=>$full_name,
        // 'email'=>$request->email,
        // 'mobile'=>$request->mobile,
        // 'message'=>$request->message]);

        return response()->json(['success' => true]);
    }

    public function index(ChartController $chart,ChartsubsribtionresturantController $chartres,ChartsubsribtionclinicController $chartclinic  ,ChartorderController $chartorder){
        $check = auth()->user();
        $admin = Admin::where('user_id',$check->id)->first();
        if($admin->place_id == null){
            return view('dashboard',['chart' => $chart->build(),'chartres' => $chartres->build(),'chartclinic' => $chartclinic->build()]);
        }else{
            return view('dashboard',['chartorder' => $chartorder->build($admin)]);
        }
    }
}
