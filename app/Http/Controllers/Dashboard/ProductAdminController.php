<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductsAdminRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Places;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{


    public function index()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        $condition = [];

        if($user_place->place_id !== null){
            $condition[] = ["places.id",'=', $user_place->place_id];
        }
        $products = DB::table('products')->join('places','products.place_id','places.id')
        ->join('categories','products.category_id','categories.id')
        ->select('products.id as id','categories.name as category_name',
        'places.name as place_name','products.image as logo','products.name as name','products.descrption as descrption' , 'products.price as price')
        ->where($condition)
        ->get();
        return view('Products.index', compact('products', 'admin'));
    }


    public function create()
    {
        $category = Category::where('type', 'restaurantes')->get();
        $resturant = places::where('type', 'restaurantes')->get();
        return view('Products.create', compact('resturant', 'category'));
    }

    public function store(ProductsAdminRequest $request)
    {
        $nameimage = $request->logo;
        if (isset($nameimage)) {
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Products/$image";
            $request->logo->move(public_path('uploads/Products'), $image);
        } else {
            $imagepath = "uploads/Products/defultfood.png";
        }
        $resturant = Products::create([
            'name' => $request->name,
            'descrption' => $request->descrption,
            'image' => $imagepath,
            'category_id' => $request->category_id,
            'place_id'=> $request->place_id,
            'price' => $request->price
        ]);
        return redirect()->route('productlist')->with('done', 'add sucessful');
    }


    public function edit($id)
    {
        $product = Products::find($id);
        $resturant = Places::where('id', $product->place_id)->first();
        $category = Category::get();
        return view('Products.edit', compact('resturant', 'product','category'));
    }


    public function update(ProductsAdminRequest $request, $id)
    {
        $category = Products::find($id);
        if (isset($request->logo)) {
            if (isset($category->image) && file_exists($category->image)) {
                $oldimage = $category->image;
                $pathimage = "uploads/Products/$oldimage";
                // Storage::disk('uploads')->delete($pathimage);
                                    unlink($oldimage);

            }
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Products/$image";
            $request->logo->move(public_path('uploads/Products'), $image);
        } else {
            $imagepath = $category->image;
        }
        $category->place_id = $request->place_id;
        $category->name = $request->name;
        $category->image = $imagepath;
        $category->price = $request->price;
        $category->save();
        return redirect()->route('productlist')->with('done', "update sucessfully");
    }


    public function destroy($id)
    {
        $category = Products::where('id', $id)->first();
        if(isset($category->logo)){
            if ($category->logo != "uploads/Products/defultfood.png" && file_exists($category->logo)) {
                unlink($category->logo);
                $category->delete();
            }
        }
        $category->delete();

        return redirect()->back()->with('done', "deleting sucessful");
    }
}
