<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartsubsribtionresturantController;
use App\Http\Controllers\ChartsubsribtionclinicController;
use App\Http\Controllers\ChartorderController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Admin;
use App\Models\ResturantRequest;


class HomeController extends Controller
{
    
    
    public function landingPage(){

            return view('landing-page');
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'business_type' => 'required|string'
        ]);
    
        // Process the validated data
        $resturant_request = ResturantRequest::create(['name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'type'=>$request->business_type]);
    
        return response()->json(['success' => true]);
    }

    public function index(ChartController $chart,ChartsubsribtionresturantController $chartres,ChartsubsribtionclinicController $chartclinic  ,ChartorderController $chartorder){
        $check = auth()->user();
        $admin = Admin::where('user_id',$check->id)->first();
        if($admin->role == "SuperAdmin"){
            return view('dashboard',['chart' => $chart->build(),'chartres' => $chartres->build(),'chartclinic' => $chartclinic->build()]);
        }else{
            return view('dashboard',['chartorder' => $chartorder->build($admin)]);
        }
    }
}
