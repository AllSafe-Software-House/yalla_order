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
        $category = Category::where('type','restaurantes')->get();

        return ApiResponse::sendresponse(200,"show category", CategoryresResource::collection($category));

    }

    public function showclinic()
    {
        $category = Category::where('type','clinic')->get();
        return ApiResponse::sendresponse(200,"show category",CategoryresResource::collection($category));

    }
    

}
