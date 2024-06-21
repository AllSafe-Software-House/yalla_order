<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Requests\FavProductRequest;
use App\Http\Resources\FavResource;
use App\Models\Doctores;
use App\Models\Favorites;
use App\Models\Menues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function addfav(FavProductRequest $request, $id)
    {
        $userid = Auth::user()->id;
        $menuproduct = Menues::find($id);
        if ($menuproduct) {
            $findproduct = Favorites::where('user_id', $userid)->where('menue_id', $id)->exists();
            if ($findproduct) {
                $findproduct = Favorites::where('user_id', $userid)->where('menue_id', $id)->first();
                $findproduct->delete();
                return ApiResponse::sendresponse(200, "remove product to fav list");
            } else {
                $favproduct = Favorites::create([
                    'user_id' => $userid,
                    'menue_id' => $id,
                    'place_id' => $menuproduct->place_id
                ]);
                return ApiResponse::sendresponse(200, "add product to fav list", $favproduct);
            }
        } else {
            return ApiResponse::sendresponse(422, "in valid product");
        }
    }

    public function listfav(Request $request)
    {
        $type = $request->input('type');
        $user = Auth::user();
        if ($type == 'clinic') {
            $listfav = DB::table('favorites')
                ->join('places', 'favorites.place_id', 'places.id')
                ->join('doctores', 'favorites.doctore_id', 'doctores.id')
                ->select(
                    // 'places.name as clinic_name',
                DB::raw("JSON_UNQUOTE(JSON_EXTRACT(places.name, '$.".app()->getLocale()."')) as clinic_name"),
                'places.id as clinic_id',
                //  'places.address as clinic_address',
                 DB::raw("JSON_UNQUOTE(JSON_EXTRACT(places.address, '$.".app()->getLocale()."')) as clinic_address"),
                //   'doctores.name as doctor_name'
                  DB::raw("JSON_UNQUOTE(JSON_EXTRACT(doctores.name, '$.".app()->getLocale()."')) as doctor_name")
                  )
                ->get()
                // ->groupBy('clinic Name');
                ->groupBy('clinic_name')
                ->map(function ($items, $clinicName) {
                    $clinicID = $items->first()->clinic_id;
                    $clinicAddress = $items->first()->clinic_address;
                    return [
                        'clinic_id' => $clinicID,
                        'clinic_name' => $clinicName,
                        'clinic_address' => $clinicAddress,
                        'items' => $items->toArray()
                    ];
                })->values();
        } elseif ($type == 'order') {
            $listfav = DB::table('favorites')
                ->join('menues', 'favorites.menue_id', 'menues.id')
                ->join('places', 'favorites.place_id', 'places.id')
                ->join('products', 'menues.product_id', 'products.id')
                // ->select('menues.id as Menues id', 'places.name as Resturant Name', 'places.address as Resturant Address', 'products.name as product Name')
                ->select('menues.id as Menues id',
                //  'places.name as restaurant_name',
                 DB::raw("JSON_UNQUOTE(JSON_EXTRACT(places.name, '$.".app()->getLocale()."')) as restaurant_name"),
                  'places.id as restaurant_id',
                //    'places.address as resturant_address',
                   DB::raw("JSON_UNQUOTE(JSON_EXTRACT(places.address, '$.".app()->getLocale()."')) as resturant_address"),
                   DB::raw("JSON_UNQUOTE(JSON_EXTRACT(products.name, '$.".app()->getLocale()."')) as product_name")
                    // 'products.name as product_name'
                    )
                ->get()
                ->groupBy('restaurant_name')
                ->map(function ($items, $restaurantName) {
                    $restaurantID = $items->first()->restaurant_id;
                    $restaurantAddress = $items->first()->resturant_address;
                    return [
                        'restaurant_id' => $restaurantID,
                        'restaurant_name' => $restaurantName,
                        'restaurant_address' => $restaurantAddress,
                        'items' => $items->toArray()
                    ];
                })->values();
        } else {
            return ApiResponse::sendresponse(
                200,
                "this type notvaild",

            );
        }
        return ApiResponse::sendresponse(
            200,
            "list favourites product",
            $listfav
        );
    }


    public function addfavdoctore(FavProductRequest $request, $id)
    {
        $userid = Auth::user()->id;
        $doctore = Doctores::find($id);
        if ($doctore) {
            $checkdoctor = Favorites::where('user_id', $userid)->where('doctore_id', $id)->exists();
            if ($checkdoctor) {
                $finddoctor = Favorites::where('user_id', $userid)->where('doctore_id', $id)->first();
                $finddoctor->delete();
                return ApiResponse::sendresponse(200, "remove doctor to fav list");
            } else {
                $favdoctor = Favorites::create([
                    'user_id' => $userid,
                    'doctore_id' => $id,
                    'place_id' => $doctore->place_id
                ]);
                return ApiResponse::sendresponse(200, "add doctor to fav list", $favdoctor);
            };
        } else {
            return ApiResponse::sendresponse(422, "in valid doctor");
        }
    }

    public function listfavdoctore()
    {
        $user = Auth::user();
        $listfav = DB::table('favorites')
            ->join('places', 'favorites.place_id', 'places.id')
            ->join('doctores', 'favorites.doctore_id', 'doctores.id')
            ->select('places.name as clinic Name', 'places.address as clinic Address', 'doctores.name as doctore Name')
            ->get()
            ->groupBy('clinic Name');
        return ApiResponse::sendresponse(
            200,
            "list favourites product",
            $listfav
        );
    }
}
