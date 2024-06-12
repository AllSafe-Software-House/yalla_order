<?php

namespace App\Http\Controllers;

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


class HomeController extends Controller
{


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
