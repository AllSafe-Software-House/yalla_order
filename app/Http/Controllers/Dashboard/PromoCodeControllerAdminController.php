<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoCodeRequest;
use App\Models\Admin;
use App\Models\Places;
use App\Models\Promo_Codes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoCodeControllerAdminController extends Controller
{


    public function index()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id', $admin->id)->first();
        if ($user_place->place_id !== null) {
            $promocode = Promo_Codes::where('place_id', $user_place->place_id)->get();
        } else {

            $promocode = Promo_Codes::where('type', 'restaurantes')->get();
        }
        return view('Promo_Code.index', compact('promocode', 'admin'));
    }


    public function indexclinic(){
        $admin = Auth::user();
        $user_place = Admin::where('user_id', $admin->id)->first();
        if ($user_place->place_id !== null) {
            $promocode = Promo_Codes::where('place_id', $user_place->place_id)->get();
        } else {

            $promocode = Promo_Codes::where('type', 'clinic')->get();
        }
        return view('Promo_Code_clinic.index', compact('promocode', 'admin'));
    }


    public function create()
    {
        $resturant = Places::where('type', 'restaurantes')->get();
        return view('Promo_Code.create', compact('resturant'));
    }

    public function createclinic()
    {
        $resturant = Places::where('type', 'clinic')->get();
        return view('Promo_Code_clinic.create', compact('resturant'));
    }

    public function store(PromoCodeRequest $request)
    {
        $promo = Promo_Codes::create([
            'place_id' => $request->place_id,
            'name' => $request->name,
            'sale' => $request->sale,
            'start' => $request->starttime,
            'end' => $request->endtime,
            'type'=>$request->type
        ]);
        return redirect()->back()->with('done', 'add sucessful');
    }


    public function edit($id)
    {
        $promo = Promo_Codes::find($id);
        if($promo->type == 'restaurantes'){
            $resturant = Places::where('type', 'restaurantes')->get();
            return view('Promo_Code.edit', compact('resturant', 'promo'));
        }else{
            $resturant = Places::where('type', 'clinic')->get();
            return view('Promo_Code_clinic.edit', compact('resturant', 'promo'));
        }

    }



    public function update(PromoCodeRequest $request, $id)
    {
        $promo = Promo_Codes::find($id);
        $promo->place_id = $request->place_id;
        $promo->name = $request->name;
        $promo->sale = $request->sale;
        $promo->start = $request->starttime;
        $promo->end = $request->endtime;
        $promo->type = $request->type;

        $promo->save();
        return redirect()->back()->with('done', "update sucessfully");
    }


    public function destroy($id)
    {
        $promo = Promo_Codes::where('id', $id)->first();
        $promo->delete();
        return redirect()->back()->with('done', "deleting sucessful");
    }
}
