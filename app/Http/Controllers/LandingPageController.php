<?php

namespace App\Http\Controllers;

use App\Models\Landingpage;
use App\Models\Resones;
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
    public function partenerpartone(){
        $partenerpartone = Landingpage::where('name','partenerpartone')->first();
        return view('LandingPge.partenerpartone',compact('partenerpartone'));
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

    // resones in the landingpage
    public function index(){
        $resones = Resones::where('name','Resoncooperate')->get();
        return view('LandingPge.resones',compact('resones'));
    }
    public function create(){
        return view('LandingPge.resonesadd');
    }
    public function edit($id){
        $reson = Resones::where('id',$id)->first();
        return view('LandingPge.resonesedit',compact('reson'));
    }
    public function destroy($id){
        $reson = Resones::where('id',$id)->first();
        $reson->delete();
        return back()->with('done', "delete sucessfully");

    }
    public function storereson(Request $request){
        $resones = Resones::where('name','Resoncooperate')->count();
        if($resones < 3){
            if (isset($nameimage)) {
                $image = time() . '.' . $request->logo->extension();
                $imagepath =  "uploads/Resones/$image";
                $request->logo->move(public_path('uploads/Resones'), $image);
            } else {
                $imagepath = "uploads/Resones/defultfood.png";
            }
            Resones::create([
                'name' => $request->name,
                'title' => [
                    "en" => $request->title,
                    "ar" => $request->title_ar,
                ],
                'description' => [
                    "en" => $request->description,
                    "ar" => $request->description_ar,
                ],
                'image' => $imagepath,
            ]);
            return back()->with('done', "add sucessfully");
        }else{
            return back()->with('done', "You Cannot Add more than 3 Resones");
        }

    }

    public function updatereson(Request $request,$id){
        $reson = Resones::where('id',$id)->first();
        $place = $reson->type;
        if (isset($request->logo)) {
            if (isset($reson->logo) && file_exists($reson->logo)) {
                $oldimage = $reson->image;
                if($oldimage != 'uploads/Resones/defultfood.png'){
                    unlink($oldimage);
                }
            }
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Resones/$image";
            $request->logo->move(public_path('uploads/Resones'), $image);

        } else {
            $imagepath = $reson->logo;
        }
        $reson->title = [
            "en" => $request->title,
            "ar" => $request->title_ar,
        ];
        $reson->description = [
            "en" => $request->description,
            "ar" => $request->description_ar,
        ];
        $reson->image = $imagepath;
        $reson->save();
        return back()->with('done', "update sucessfully");
    }
}
