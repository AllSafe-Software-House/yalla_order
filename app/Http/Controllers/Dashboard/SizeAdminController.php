<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Models\Admin;
use App\Models\Menues;
use App\Models\Places;
use App\Models\Products;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SizeAdminController extends Controller
{


    public function index()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        $condition = [];

        if($user_place->place_id !== null){
            $condition[] = ["places.id",'=', $user_place->place_id];
        }
        // $size = DB::table('sizes')->join('places','sizes.places_id','places.id')
        // ->select('sizes.id as id','sizes.size as size',
        // 'places.name as place_name','sizes.price as price')
        // ->where($condition)
        // ->get();
        $size = Size::with('place')->where($condition)->get() ;
        return view('Size.index', compact('size', 'admin'));
    }


    public function create()
    {
        $resturant = Places::where('type', 'restaurantes')->get();
        return view('Size.create',compact('resturant'));
    }

    public function getProducts($placeid)
    {
        $menues = Menues::where('place_id', $placeid)->get();
        $products = [];
        foreach ($menues as $product){
            $item = Products::where('id', $product->id)->first();
            $products[] = $item;
        }
        return response()->json($products);
    }



    public function store(SizeRequest $request)
    {
        $size = Size::create([
            'places_id' => $request->place_id,
            'size' => [
                "en" => $request->size,
                "ar" => $request->size_ar,
            ],
            'menue_id' => $request->menue_id,
            'price' => $request->price,
        ]);
        return redirect()->route('sizelist')->with('done', 'add sucessful');
    }


    public function edit($id)
    {
        $size = Size::find($id);
        $resturant = Places::where('type', 'restaurantes')->get();
        return view('Size.edit', compact('resturant','size'));
    }


    public function update(SizeRequest $request, $id)
    {
        $size = Size::find($id);
        $size->places_id = $request->place_id;
        $size->size = [
            "en" => $request->size,
            "ar" => $request->size_ar,
        ];
        $size->price = $request->price;
        $size->menue_id = $request->menue_id;
        $size->save();
        return redirect()->route('sizelist')->with('done', "update sucessfully");
    }


    public function destroy($id)
    {
        $category = Size::where('id', $id)->first();
        $category->delete();
        return redirect()->route('sizelist')->with('done', "deleting sucessful");
    }
}
