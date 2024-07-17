<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Resources\MenueResource;
use App\Models\Category;
use App\Models\Favorites;
use App\Models\Menues;
use App\Models\Places;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuesController extends Controller
{
    public function checkfav($id){
        $userid = Auth::user()->id;
        $check = Favorites::where('user_id',$userid)->where('menue_id',$id)->exists();
        $menu = Menues::find($id);
        if($check){
                $menues = [
                    'id' =>$menu->id,
                    'productname' => $menu->product->name,
                    'product name' => $menu->product->name,
                    'productdescrption' => $menu->product->descrption,
                    'product descrption' => $menu->product->descrption,
                    'productprice' => $menu->product->price,
                    'product price' => $menu->product->price,
                    'dicount (%)' => $menu->sale,
                    'logo' => asset($menu->product->image),
                    'product status fav' => true,
                    'productstatusfav' => true,
                ];

        }else{
                $menues = [
                    'id' =>$menu->id,
                    'product name' => $menu->product->name,
                    'productname' => $menu->product->name,
                    'product descrption' => $menu->product->descrption,
                    'productdescrption' => $menu->product->descrption,
                    'product price' => $menu->product->price,
                    'productprice' => $menu->product->price,
                    'dicount (%)' => $menu->sale,
                    'logo' => asset($menu->product->image),
                    'product status fav' => false,
                    'productstatusfav' => false,
                ];
        }
        return $menues;
    }


    public function show($id)
    {
        $checkmenues = Menues::where('place_id',$id)->exists();
        if($checkmenues){
            $menues = Menues::where('place_id', $id)->get();
            // foreach ($menues as $categoryId => $categoryMenues) {
            //     $categname = Category::find($categoryId);
                // $categoryData = [->groupBy('category_id')
                //     "Category name" =>$categname->name,
                //     "$categname->name" => [],
                // ];
                $processedData  = [];

                foreach ($menues as $menu) {
                    $checkfav = $this->checkfav($menu->id);
                    $processedData[] = $checkfav;
                }

            // }

            return ApiResponse::sendresponse(200, "show menue restaurantes", $processedData );

        }else{
            return ApiResponse::sendresponse(422,  "in valid resturant");
        }

    }


    public function showbyfilter($id ,$categid){
        $checkmenues = Menues::where('category_id',$categid)->exists();
        if($checkmenues){
            $listmenues = Menues::where('category_id',$categid)->where('place_id',$id)->exists();
            if($listmenues){
                $listmenues = Menues::where('category_id',$categid)->where('place_id',$id)->get();
                $processedData  = [];
                foreach ($listmenues as $data) {
                    $checkfav = $this->checkfav($data->id);
                    $processedData [] = $checkfav;
                }
                return ApiResponse::sendresponse(200, "show restaurantes", $processedData );
            }else{
                return ApiResponse::sendresponse(422, "in valid menue" );
            }

        }else{
            return ApiResponse::sendresponse(422, "in valid category" );
        }
    }


    public function showbestselling($id)  {
        $check = Places::where('id',$id)->first();
        if(!$check){
            return ApiResponse::sendresponse(401, "this invalid" );
        }
        if($check->type == 'clinic'){
            return ApiResponse::sendresponse(401, "this invalid" );
        }
        $menubest = Menues::where('count_selling','!=',0)->where('place_id',$id)->orderBy('count_selling','desc')->get();
        return ApiResponse::sendresponse(200, "show best sellin in menu", $menubest );
    }

    public function showbycategory($id){
        $category = Category::where('id',$id)->where('type','restaurantes')->first();
        $result = [];
        if(!$category){
            return ApiResponse::sendresponse(401,  "in valid category");
        }
        $listmenues = Menues::where('category_id',$id)->get();
        foreach ($listmenues as $data) {
            $checkfav = $this->checkfav($data->id);
            $checkfav['place_logo'] = asset($data->place->logo);
            $checkfav['place_name'] = $data->place->name;
            $checkfav['place_id'] = $data->place->id;
            $checkfav['category_name'] = $category->name;
            $result [] = $checkfav;
        }
        return ApiResponse::sendresponse(200, "show restaurantes by category", $result );
    }
    public function showclinicbycategory($id){
        $category = Category::where('id',$id)->where('type','clinic')->first();
        $result = [];
        if(!$category){
            return ApiResponse::sendresponse(401,  "in valid category");
        }
        $listclinic = Places::where('category_id',$id)->get();
        foreach ($listclinic as $data) {
            $result = [
                "id" => $data->id,
                "place_name" => $data->name,
                "place_logo" => asset($data->logo),
                "descrption" => $data->descrption,
                "starttime" => $data->starttime,
                "endtime" => $data->endtime,
                "address" => $data->address ,
                "delivery_fee" => $data->delivery_fee,
            ];
        }
        return ApiResponse::sendresponse(200, "show clinic by category", $result );
    }

}
