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
                ->select('places.name as clinic Name', 'places.address as clinic Address', 'doctores.name as doctore Name')
                ->get()
                ->groupBy('clinic Name');
        } elseif ($type == 'order') {
            $listfav = DB::table('favorites')
                ->join('menues', 'favorites.menue_id', 'menues.id')
                ->join('places', 'favorites.place_id', 'places.id')
                ->join('products', 'menues.product_id', 'products.id')
                ->select('menues.id as Menues id', 'places.name as Resturant Name', 'places.address as Resturant Address', 'products.name as product Name')
                ->get()
                ->groupBy('Resturant Name');
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
