<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUSRequest;
use App\Models\BestLandingPage;
use App\Models\Content_US;
use App\Models\Doctores;
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
    public function indexsteps(){
        $resones = Resones::where('name','ResonWorkTogether')->get();
        return view('LandingPge.resonesworktogether',compact('resones'));
    }
    public function create(){
        return view('LandingPge.resonesadd');
    }
    public function createstep(){
        return view('LandingPge.resonesworkadd');
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
        if (isset($request->logo)) {
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Resones/$image";
            $request->logo->move(public_path('uploads/Resones'), $image);
        } else {
            $imagepath = "uploads/Resones/defultfood.png";
        }
        if($request->name == 'ResonWorkTogether'){
            if($resones < 4){
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
                return back()->with('done', "You Cannot Add more than 4 Resones");
            }
        }else{
            if($resones < 3){
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

    }

    public function updatereson(Request $request,$id){
        $reson = Resones::where('id',$id)->first();
        if (isset($request->logo)) {
            if (isset($reson->image) && file_exists($reson->image)) {
                $oldimage = $reson->image;
                if($oldimage != 'uploads/Resones/defultfood.png'){
                    unlink($oldimage);
                }
            }
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Resones/$image";
            $request->logo->move(public_path('uploads/Resones'), $image);

        } else {
            $imagepath = $reson->image;
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


    // contact us in landing page
    public function contactus(ContactUSRequest $request)  {
        $contact = Content_US::create([
            "fname" => $request->fname,
            "lname"  => $request->lname,
            "email"  => $request->email,
            "phone"  => $request->phone,
            "message"  => $request->message
        ]);
        return back()->with('done', "will contact you");
    }



    // bestdoctore in landingpage
    public function bestdoctore(){
        $bestdoctore = BestLandingPage::all();
        return view('LandingPge.bestdoctore.bestdoctor',compact('bestdoctore'));
    }

    public function bestdoctoradd(){
        $doctor = Doctores::all();
        return view('LandingPge.bestdoctore.bestdoctoradd',compact('doctor'));
    }
    public function bestdoctoredit($id){
        $doctor = BestLandingPage::find($id);
        $doctoresitem = Doctores::all();
        return view('LandingPge.bestdoctore.bestdoctoredit',compact('doctor','doctoresitem'));
    }

    public function bestdoctorestore(Request $request){
        bestLandingPage::create([
            'doctore_id' => $request->doctore_id,
        ]);
        return back()->with('done', "add sucessfully");
    }

    public function bestdoctorupdate(Request $request,$id){
        $bestdoctore = BestLandingPage::find($id);
        $bestdoctore->doctore_id = $request->doctore_id;
        $bestdoctore->save();
        return back()->with('done', "update sucessfully");
    }

    public function bestdoctordestory($id){
        $bestdoctore = BestLandingPage::find($id);
        $bestdoctore->delete();
        return back()->with('done', "delete sucessfully");
    }
}