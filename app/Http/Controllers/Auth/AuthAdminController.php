<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    public function changepage()
    {
        $user = Auth::user();
        return view('admin_change_password', compact('user'));
    }
    public function changepassword(Request $request)
    {
        $admin = Auth::user();
        $adminuser = User::where('id', $admin->id)->first();
        $checkold = Hash::check($request->old_password, $admin->password);
        if (!$checkold) {
            return redirect()->back()->with('error', 'Old password is incorrect');
        }
        $request->validate([
            'new_password' => 'required|string|min:6|confirmed',
        ]);
        $adminuser->password = Hash::make($request->new_password);
        $adminuser->save();
        return redirect()->back()->with('done', 'change password sucessful');
    }
    public function profile()
    {
        $user = Auth::user();
        $adminData = User::where('id',$user->id)->first();
        return view('Admin.admin_profile_view', compact('user','adminData'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $admintable = User::where('id',$user->id)->first();
        $admintable->name = $request->name;
        $admintable->email = $request->email;
        $admintable->save();
        return redirect()->back()->with('done', 'change data sucessful');

    }
}
