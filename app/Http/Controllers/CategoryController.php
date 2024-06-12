<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Resources\CategoryresResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show()
    {
        $category = DB::table('categories')
        // ->select('categories.id as id','categories.name as name','categories.logo as logo','places.type as type')->join('places','categories.place_id','places.id')
        ->where('type','restaurantes')->get();
        return ApiResponse::sendresponse(200,"show category", CategoryresResource::collection($category));

    }

    public function showclinic()
    {
        $category = DB::table('categories')
        // ->select('categories.id as id','categories.name as name','categories.logo as logo','places.type as type')->join('places','categories.place_id','places.id')
        ->where('type','clinic')->get();
        return ApiResponse::sendresponse(200,"show category",CategoryresResource::collection($category));

    }
    

}
