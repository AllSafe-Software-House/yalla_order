<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddtionAdminRequest;
use App\Models\Addons;
use App\Models\Admin;
use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddtionAdminController extends Controller
{


    public function index()
    {
        $admin =  Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        $condition = [];

        if($user_place->place_id !== null){
            $condition[] = ["places.id",'=', $user_place->place_id];
        }
        $addtion = DB::table('addons')->join('places','addons.place_id','places.id')
        ->select('addons.id as id','places.name as place_name','addons.name as name',
        'addons.type as type' , 'addons.price as price')
        ->where($condition)
        ->get();
        return view('Addition.index', compact('addtion', 'admin'));
    }


    public function create()
    {
        $resturant = Places::where('type', 'restaurantes')->get();
        return view('Addition.create', compact('resturant'));
    }

    public function store(AddtionAdminRequest $request)
    {
        $addtion = Addons::create([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'place_id'=> $request->place_id,
        ]);
        return redirect()->route('addtionlist')->with('done', 'add sucessful');
    }


    public function edit($id)
    {
        $addtion = Addons::find($id);
        $resturant = Places::where('id',$addtion->place_id)->first();
        return view('Addition.edit', compact('addtion', 'resturant'));
    }


    public function update(AddtionAdminRequest $request, $id)
    {
        $addtion = Addons::find($id);
        $addtion->place_id = $request->place_id;
        $addtion->name = $request->name;
        $addtion->price = $request->price;
        $addtion->type = $request->type;
        $addtion->save();
        return redirect()->route('addtionlist')->with('done', "update sucessfully");
    }


    public function destroy($id)
    {
        $category = Addons::where('id', $id)->first();
        $category->delete();
        return redirect()->route('addtionlist')->with('done', "deleting sucessful");
    }
}
