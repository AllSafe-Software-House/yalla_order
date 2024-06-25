<?php

namespace App\Http\Controllers;

use App\Models\Landingpage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function partone(){
        $partone = Landingpage::where('name','PartOne')->first();
        return view('LandingPge.partone',compact('partone'));
    }
    public function partoneclinic(){
        $partoneclinic = Landingpage::where('name','PartOneClinic')->first();
        return view('LandingPge.partoneclinic',compact('partoneclinic'));
    }
    public function parttwo(){
        $parttwo = Landingpage::where('name','PartTwo')->first();
        return view('LandingPge.parttwo',compact('parttwo'));
    }
    public function parttwoclinic(){
        $parttwoclinic = Landingpage::where('name','PartTwoClinic')->first();
        return view('LandingPge.parttwoclinic',compact('parttwoclinic'));
    }

    public function cardfood(){
        $cardfood = Landingpage::where('name','CardFood')->first();
        return view('LandingPge.cardfood',compact('cardfood'));
    }
    public function cardclinic(){
        $cardclinic = Landingpage::where('name','CardClinic')->first();
        return view('LandingPge.cardclinic',compact('cardclinic'));
    }

    public function partonestore(Request $request){
        Landingpage::create([
            'name' => $request->name,
            'title' => [
                "en" => $request->title,
                "ar" => $request->title_ar,
            ],
            'description' => [
                "en" => $request->description,
                "ar" => $request->description_ar,
            ]
        ]);
        return back()->with('done', "add sucessfully");
    }
    public function partoneupdate(Request $request){
        $partone = Landingpage::where('name',$request->name)->first();
        $partone->title = [
            "en" => $request->title,
            "ar" => $request->title_ar,
        ];
        $partone->description = [
            "en" => $request->description,
            "ar" => $request->description_ar,
        ];
        $partone->save();
        return back()->with('done', "update sucessfully");
    }
}
