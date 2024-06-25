<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Content_US;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactusController extends Controller
{

    public function index()
    {
        $contactus = Content_US::where('type','order')->get();
        $admin = Auth::user();

        return view('ContactUs.ContactUs', compact('contactus','admin'));

    }

    public function indexclinic()
    {
        $contactus = Content_US::where('type','clinic')->get();
        $admin = Auth::user();

        return view('ContactUs.ContactUs', compact('contactus','admin'));
    }
    public function destore($id)
    {
        $staff = Content_US::find($id);
        $staff->delete();
        return redirect()->back()->with("done", "delete successs");
    }

}
