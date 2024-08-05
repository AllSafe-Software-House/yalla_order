<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\resturant\PlacesRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Places;
use App\Models\ResturantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlacesAdminController extends Controller
{

    public function storelogo(PlacesRequest $request)
    {
        $place = $request->place;
        if ($place == 'clinic') {
            if ($request->logo) {
                $image = time() . '.' . $request->logo->extension();
                $imagepath =  "uploads/Clinic/$image";
                $request->logo->move(public_path('uploads/Clinic'), $image);
            } else {
                $imagepath =  "uploads/Clinic/icons8-clinic-80.jpg";
            }
        } else {
            if ($request->logo) {
                $image = time() . '.' . $request->logo->extension();
                $imagepath =  "uploads/resturants/$image";
                $request->logo->move(public_path('uploads/resturants'), $image);
            } else {
                $imagepath =  "uploads/resturants/icons8-resturant-66.png";
            }
        }
        return $imagepath;
    }
    public function updatelogo(PlacesRequest $request, $id)
    {
        $resturant = Places::find($id);
        $place = $resturant->type;
        if (isset($request->logo)) {
            if (isset($resturant->logo) && file_exists($resturant->logo)) {
                $oldimage = $resturant->logo;
                if($oldimage != 'uploads/Clinic/icons8-clinic-80.png' || $oldimage != 'uploads/resturants/icons8-resturant-6'){
                    unlink($oldimage);
                }
            }
            $image = time() . '.' . $request->logo->extension();
            if ($place == 'clinic') {
                $imagepath =  "uploads/Clinic/$image";
                $request->logo->move(public_path('uploads/Clinic'), $image);
            } else {
                $imagepath =  "uploads/resturants/$image";
                $request->logo->move(public_path('uploads/resturants'), $image);
            }
        } else {
            $imagepath = $resturant->logo;
        }
        return $imagepath;
    }

    public function resturantTransactions($id){
        $resturant = Places::find($id);
        // return $user;
        $transactions = $resturant->walletTransactions;
        return view('Resturant.transactions', compact('resturant','transactions'));
    }

    public function resturant_request()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id', $admin->id)->first();
        // if ($user_place->place_id !== null) {
        //     $resturant = Places::where('id', $user_place->place_id)->get();
        // } else {
        $resturant = ResturantRequest::paginate(10);
        // }
        return view('Resturant.resturant_request', compact('resturant', 'admin'));
    }


    public function index()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id', $admin->id)->first();
        // if ($user_place->place_id !== null) {
        //     $resturant = Places::where('id', $user_place->place_id)->get();
        // } else {
        $resturant = Places::where('type', 'restaurantes')->paginate(10);
        // $resturant = Places::where('type', 'restaurantes')->get();
        // }
        return view('Resturant.index', compact('resturant', 'admin'));
    }


    public function create()
    {
        return view('Resturant.create');
    }

    public function index_clinic()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id', $admin->id)->first();
        // if ($user_place->place_id !== null) {
        //     $clinic = Places::where('id', $user_place->place_id)->get();
        // } else {
        $clinic = Places::where('type', 'clinic')->get();
        // }
        return view('Clinic.index', compact('clinic', 'admin'));
    }

    public function create_clinic()
    {
        $category = Category::where('type', 'clinic')->get();
        return view('Clinic.create',compact('category'));
    }


    public function clinicTransactions($id){
        $clinic = Places::find($id);
        // return $user;
        $transactions = $clinic->walletTransactions;
        return view('Clinic.transactions', compact('clinic','transactions'));
    }

    public function store(PlacesRequest $request)
    {
        $imagepath = $this->storelogo($request);
        $place = $request->place;
        $resturant = Places::create([
            'name' => [
                "en" => $request->name,
                "ar" => $request->name_ar,
            ],
            'descrption' => [
                "en" => $request->descrption,
                "ar" => $request->descrption_ar,
            ],
            'starttime' => $request->starttime,
            'endtime' => $request->endtime,
            'address' => [
                "en" => $request->address,
                "ar" => $request->address_ar,
            ],
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'logo' => $imagepath,
            'type' => $place,
            'delivery_fee' => $request->delivery_fee,
            'category_id' => $request->category_id
        ]);
        if ($place == 'clinic') {
            return redirect()->route('cliniclist')->with('done', 'add sucessful');
        } else {
            return redirect()->route('resturantlist')->with('done', 'add sucessful');
        }
    }


    public function edit($id)
    {
        $place = Places::find($id);
        if ($place->type == 'clinic') {
            return view('Clinic.edit', compact('place'));
        } else {
            return view('Resturant.edit', compact('place'));
        }
    }

    public function checklocationrequest($request,$id){
        if(isset($request->longitude) && isset($request->latitude)){
            $location =  [
                'longitude' => $request->longitude,
                'latitude' => $request->latitude
            ];
        }else{
            $resturant = Places::find($id);
            if($resturant->longitude === null || $resturant->latitude === null){
                $location = 'error' ;
            }else{
                $location =  [
                    'longitude' => $resturant->longitude,
                    'latitude' => $resturant->latitude
                ];
            }
        }
        return $location;
    }

    public function update(PlacesRequest $request, $id)
    {
        $resturant = Places::find($id);
        $locationmap = $this->checklocationrequest($request,$id);
        if($locationmap == 'error'){
            return redirect()->back()->with('fail', "please add location to $resturant->name");
        }
        $image = $this->updatelogo($request, $id);
        $place = $request->place;
        $resturant->name = [
                "en" => $request->name,
                "ar" => $request->name_ar,
        ];
        $resturant->descrption = [
            "en" => $request->descrption,
            "ar" => $request->descrption_ar,
        ];
        $resturant->starttime = $request->starttime;
        $resturant->endtime = $request->endtime;
        $resturant->logo = $image;
        $resturant->address = [
                "en" => $request->address,
                "ar" => $request->address_ar,
        ];
        $resturant->type = $place;
        $resturant->longitude = $locationmap['longitude'];
        $resturant->latitude = $locationmap['latitude'];
        $resturant->delivery_fee = $request->delivery_fee;
        $resturant->save();
        if ($place == 'clinic') {
            return redirect()->route('cliniclist')->with('done', "update sucessfully");
        } else {
            return redirect()->route('resturantlist')->with('done', "update sucessfully");
        }
    }


    public function destroy($id)
    {
        $product = Places::where('id', $id)->first();
        if ($product->logo == "uploads/Clinic/icons8-clinic-80.png" || "uploads/resturants/icons8-resturant-66.png") {
            $product->delete();
        } else {
            unlink($product->logo);
            $product->delete();
        }
        if ($product->type == 'clinic') {
            return redirect()->route('cliniclist')->with('done', "update sucessfully");
        } else {
            return redirect()->route('resturantlist')->with('done', "update sucessfully");
        }
    }


    // _destroy_resturant_request

    public function destroy_resturant_request($id)
    {
        $product = ResturantRequest::where('id', $id)->first();
        $product->delete();
        return back()->with('done', "delete sucessfully");
    }


    //change status place by admin
    public function changestatuspage($id){
        $place = places::where('id', $id)->first();
        return view('changestatusplace',compact('place'));
    }
    public function changestatus(Request $request){
        $place = places::where('id', $request->id)->first();
        $place->status = $request->status;
        $place->save();
        return back()->with('done', "update status sucessfully");
    }

    // update status place automatically after 12 hours
    public function updatestatus($id){
        $place = places::where('id', $id)->first();
        $placestatrt = strtotime($place->created_at);
        dd($placestatrt);
        $place->status = 1;
        $place->save();
        return back()->with('done', "update status sucessfully");
    }



    public function filter(Request $request)
    {
        if(isset($request->nameorder)){
            $resturant = [];
            $dataresturant = places::where('name','like',"%$request->nameorder%")->where('type','restaurantes')->get();
            if($dataresturant){
                foreach($dataresturant as $dataresult){
                    $resturant[] = $dataresult;
                }
            }
            return view('Resturant.index' , compact('resturant'));
        }
        if(isset($request->nameclinic)){
            $clinic = [];
            $dataclinic = places::where('name','like',"%$request->nameclinic%")->where('type','clinic')->get();
            if($dataclinic){
                foreach($dataclinic as $dataresult){
                    $clinic[] = $dataresult;
                }
            }
            return view('Clinic.index' , compact('clinic'));
        }

    }

}
