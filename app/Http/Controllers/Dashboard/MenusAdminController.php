<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenusAdminRequest;
use App\Models\Menues;
use App\Models\Places;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenusAdminController extends Controller
{
    public function index($id)
    {
        $admin = Auth::user();
        $menue = Menues::where('place_id',$id)->get();
        $resturant = Places::find($id);
        return view('Resturant.Menu.list', compact('menue', 'admin','resturant'));
    }


    public function create($id)
    {
        $resturant = Places::find($id) ;
        $product = Products::where('place_id',$id)->get();
        return view('Resturant.Menu.create',compact('resturant','product'));
    }

    public function store(MenusAdminRequest $request)
    {
        $product = Products::where('id',$request->product_id)->first();
        $menue = Menues::create([
            'place_id' => $request->place_id,
            'product_id' => $product->id,
            'sale' => $request->sale,
            'category_id' =>$product->category_id
        ]);
        return redirect()->route('menulist',$request->place_id)->with('done', 'add sucessful');
    }


    public function edit($id)
    {
        $menue = Menues::find($id);
        return view('Resturant.Menu.edit', compact('menue'));
    }


    public function update(Request $request, $id)
    {
        $menue = Menues::find($id);
        $menue->sale = $request->sale;
        $menue->save();
        return redirect()->back()->with('done', "update sucessfully");
    }


    public function destroy($id)
    {
        $product = Menues::where('id', $id)->first();
        $product->delete();
        return redirect()->route('menulist',$product->place_id)->with('done', "deleting sucessful");
    }
}
