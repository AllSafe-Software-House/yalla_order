<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryAdminRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class CategoryAdminController extends Controller
{
    public function storelogo($request){
        $nameimage = $request->logo;
        $place = $request->place;

        if (isset($nameimage)) {
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/category/$image";
            $request->logo->move(public_path('uploads/category'), $image);
        } else {
            if($place == 'clinic'){
                $imagepath = "uploads/category/icons8-clinic-80.jpg";
            }else{
                $imagepath = "uploads/category/defultfood.png";
            }
        }
        return $imagepath;
    }

    public function updatelogo($request , $id){
        $category = Category::find($id);
        if (isset($request->logo)) {
            if (isset($category->logo)) {
                $oldimage = $category->logo;
                $pathimage = "uploads/category/$oldimage";
                if($oldimage != "uploads/category/defultfood.png"){
                    if($oldimage != "uploads/Clinic/icons8-clinic-80.jpg"){
                        unlink($oldimage);
                    }
                }
            }
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/category/$image";
            $request->logo->move(public_path('uploads/category'), $image);
        } else {
            $imagepath = $category->logo;
        }
        return $imagepath;
    }


    public function index()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        $condition = [];

        if($user_place->place_id !== null){
            $condition[] = ["places.id",'=', $user_place->place_id];
        }
        $category = Category::where('type','restaurantes')->get();
        return view('Category.index', compact('category', 'admin'));
    }


    public function create()
    {
        return view('Category.create');
    }

    public function index_clinic()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        $condition = [];

        if($user_place->place_id !== null){
            $condition[] = ["places.id",'=', $user_place->place_id];
        }
        $category = Category::where('type','clinic')->get();
        return view('Category.index_clinic', compact('category', 'admin'));
    }


    public function create_clinic()
    {
        return view('Category.create_clinic');
    }

    public function store(CategoryAdminRequest $request)
    {
        $imagepath = $this->storelogo($request) ;
        $place = $request->place;
        $resturant = Category::create([
            // 'place_id' => $request->place_id,
            'name' => [
                "en" => $request->name,
                "ar" => $request->name_ar,
            ],
            'logo' => $imagepath,
            'type'=> $place
        ]);
        if($place == 'clinic'){
            return redirect()->route('categorycliniclist')->with('done', 'add sucessful');
        }else{
            return redirect()->route('categorylist')->with('done', 'add sucessful');
        }
    }


    public function edit($id)
    {
        $category = Category::find($id);
        $place = Places::where('id',$category->place_id)->first();
        if($category->type == 'clinic'){
            return view('Category.edit_clinic', compact('category'));
        }else{
            return view('Category.edit', compact('category'));
        }
    }


    public function update(CategoryAdminRequest $request, $id)
    {
        $category = Category::find($id);
        $place = $request->place;
        $imagepath = $this->updatelogo($request,$id) ;
        // $category->place_id = $request->place_id;
        $category->name = [
            "en" => $request->name,
            "ar" => $request->name_ar,
        ];
        $category->logo = $imagepath;
        $category->type = $category->type;
        $category->save();
        if($place == 'clinic'){
            return redirect()->route('categorycliniclist')->with('done', "update sucessfully");
        }else{
            return redirect()->route('categorylist')->with('done', "update sucessfully");
        }
    }


    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        
            $category->delete();
        
        return redirect()->back()->with('done', "delete sucessfully");
    }




}
