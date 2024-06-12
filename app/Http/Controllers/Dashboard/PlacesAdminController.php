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
                $imagepath =  "uploads/Clinic/icons8-clinic-80.png";
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
                // $pathimage = "uploads/resturants/$oldimage";
                // Storage::disk('uploads')->delete($pathimage);
                                    unlink($oldimage);

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
        $resturant = Places::where('type', 'restaurantes')->get();
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

    public function store(PlacesRequest $request)
    {
        $imagepath = $this->storelogo($request);
        $place = $request->place;
        $resturant = Places::create([
            'name' => $request->name,
            'descrption' => $request->descrption,
            'starttime' => $request->starttime,
            'endtime' => $request->endtime,
            'address' => $request->address,
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


    public function update(PlacesRequest $request, $id)
    {
        $resturant = Places::find($id);
        $image = $this->updatelogo($request, $id);
        $place = $request->place;
        $resturant->name = $request->name;
        $resturant->descrption = $request->descrption;
        $resturant->starttime = $request->starttime;
        $resturant->endtime = $request->endtime;
        $resturant->logo = $image;
        $resturant->address = $request->address;
        $resturant->type = $place;
        $resturant->longitude = $request->longitude;
        $resturant->latitude = $request->latitude;
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
    
    

    
}
