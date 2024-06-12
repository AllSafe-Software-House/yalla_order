<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Resources\ProductSaleResource;
use App\Http\Resources\ProductShowResource;
use App\Models\Menues;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show()
    {
        $product = Products::all();
        return ApiResponse::sendresponse(200, "show product",ProductShowResource::collection($product));

    }


    public function productdiscount() {
        $productssale = Menues::where('sale','!=',null)->get();
        return ApiResponse::sendresponse(200, "add item to card", ProductSaleResource::collection($productssale));
    }
}
