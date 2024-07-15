<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\DoctoreResource;
use App\Http\Resources\placesResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ClinicallResoures;
use App\Http\Resources\NearResource;
use App\Http\Resources\ReviewResource;
use App\Models\Category;
use App\Models\Doctores;
use App\Models\Menues;
use App\Models\Places;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlacesController extends Controller
{

    public function show()
    {
        $restaurantes = Places::where('type', 'restaurantes')->get();
        return ApiResponse::sendresponse(200, "show restaurantes",placesResource::collection($restaurantes));
    }

    public function index_clinic($category_id)
    {
        $checkisset = Category::where('id', $category_id)->exists();
        // $clinic = DB::table('places')->join('categories', 'places.category_id', 'categories.id')
        // ->where('categories.id', $category_id)
        // ->where('places.type', 'clinic')
        // ->get();
        $clinic = Places::where('category_id', $category_id)->get();
        if ($checkisset) {
            $category = Category::where('id', $category_id)->first();
            $place = Places::where('id', $category->place_id)->first();
            // if ($place->type != 'clinic') {
            //     return ApiResponse::sendresponse(422, "This category not invalid");
            // }else{
                return ApiResponse::sendresponse(200, "show clinic",ClinicallResoures::collection($clinic));
            // }

        } else {
            return ApiResponse::sendresponse(404, "This category not found");
        }
    }

    public function searchres(SearchRequest $request)
    {
        if ($request->type == 'clinic') {
            $clinic = Places::where('name', 'like', "%$request->name%")->where('type', 'clinic')->get();
            return ApiResponse::sendresponse(200, "show result search clinic",ClinicallResoures::collection($clinic));
        } elseif ($request->type == 'order') {
            $restaurantes = Places::where('name', 'like', "%$request->name%")->where('type', 'restaurantes')->get();
            return ApiResponse::sendresponse(200, "show result search restaurantes",placesResource::collection($restaurantes));
        } else {
            return ApiResponse::sendresponse(402, 'this type not valid');
        }
    }


    public function searchlocation(Request $request)
    {
        if ($request->type == 'clinic') {
            $clinic = Places::where('address', "like", "%$request->location%")->where('type', 'clinic')->get();
            return ApiResponse::sendresponse(200, "show result search clinic", ClinicallResoures::collection($clinic));
        } elseif ($request->type == 'order') {
            $restaurantes = Places::where('address', 'like', "%$request->location%")->where('type', 'restaurantes')->get();
            return ApiResponse::sendresponse(200, "show result search restaurantes", placesResource::collection($restaurantes));
        } else {
            return ApiResponse::sendresponse(402, 'this type not valid');
        }
    }


    public function showresdetails($id)
    {
        $restaurantes = Places::where('type', 'restaurantes')->where('id',$id)->first();
        $menubest = Menues::where('count_selling','!=',0)->where('place_id',$id)->orderBy('count_selling','desc')->with('product')->get();
        $review = Reviews::where('place_id',$id)->with('place','user')->get();
        $totalrate = Reviews::where('place_id',$id)->first();
        if(!$totalrate){
            $rate = 0;
        }else{
            $rate = $totalrate->rate_num;
        }
        if(!$restaurantes){
            return ApiResponse::sendresponse(404, "This restaurant not found");
        }
        return ApiResponse::sendresponse(200, "show restaurantes",[
            "Total rate" => $rate,
           "resturant info" => new placesResource($restaurantes),
           "best selling" => ProductResource::collection($menubest),
           "reviwes" => ReviewResource::collection($review)
        ]);
    }


    public function showclinicdetails($id)
    {
        $clinic = Places::where('type', 'clinic')->where('id',$id)->first();
        $doctors = Doctores::where('place_id', $id)->get();
        if(!$clinic){
            return ApiResponse::sendresponse(404, "This clinic not found");
        }
        return ApiResponse::sendresponse(200, "show restaurantes", [
            "clinic info" =>new ClinicResource($clinic),
            "Doctors" => DoctoreResource::collection($doctors)
        ]);
    }

        // search location
    public function findPropertiesNearMe(Request $request) {
        $request->validate([
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'type' => ['required','string']
        ]);

        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $data = Places::where('type',$request->type)
            ->select("places.*", DB::raw("6371 * acos(cos(radians($latitude))
                * cos(radians(places.latitude))
                * cos(radians(places.longitude) - radians($longitude))
                + sin(radians($latitude))
                * sin(radians(places.latitude))) AS distance"))
            ->havingRaw('distance <= 10')
            ->get(); // Use get() to actually retrieve the data

        // Return the data as a JSON response
        return ApiResponse::sendresponse(200, "show places",NearResource::collection($data));
    }


public function showlistclinic(){
    $clinic = Places::where('type', 'clinic')->get();
    return ApiResponse::sendresponse(200, "show all clinic",placesResource::collection($clinic));
}

}
