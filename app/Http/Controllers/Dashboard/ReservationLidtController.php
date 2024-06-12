<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Reservationes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationLidtController extends Controller
{
    public function index(){
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        if($user_place->place_id !== null){
            $reservation = Reservationes::where('place_id',$user_place->place_id)->with('doctore','place')->paginate(10);
        }else{
            $reservation = Reservationes::paginate(10);
        }
        return view('Reservation.index' , compact('reservation'));
    }

    public function destory($id) {
        $reservation = Reservationes::find($id);
        $reservation->delete();
        return redirect()->back()->with('done','deleting reservation');

    }
}
