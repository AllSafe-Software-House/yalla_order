<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAddReqyest;
use App\Models\Admin;
use App\Models\Places;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:showUser',['only'=>['index','indexadmin','show']]);
    //     $this->middleware('perimission:addUser', ['only' => ['create', 'store']]);
    //     $this->middleware('perimission:editUser', ['only' => ['edit', 'update']]);
    //     $this->middleware('perimission:deleteUser', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $data = User::orderBy('id', 'DESC')->where('role','user')->paginate(10);
        return view('users.index_list', compact('data'));
    }

    public function indexadmin()
    {
        $admin = Admin::orderBy('id', 'DESC')->with('user')->paginate(10);
        return view('users.index_Admin', compact('admin'));
    }

    public function create()
    {
        $roles = Role::all();
        $resturant = Places::where('type', 'restaurantes')->get();
        $clinic = Places::where('type', 'clinic')->get();
        return view('users.create', compact('roles', 'resturant','clinic'));
    }

    public function store(AdminAddReqyest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);
        $role = Role::where('name', $request->roles_name)->first();
        $admin = Admin::create([
            'user_id' => $user->id,
            'role_id' => $role->id,
            'place_id' => $request->place_id,
        ]);
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('adminlist')->with('done', 'add new admin with role');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }



    public function userTransactions(User $user){
        // $user = User::find($id);
        $transactions = $user->walletTransactions;
        return view('users.transactions', compact('user','transactions'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,' . $id,
    //         'password' => 'same:confirm-password',
    //         'roles' => 'required'
    //     ]);
    //     $input = $request->all();
    //     if (!empty($input['password'])) {
    //         $input['password'] = Hash::make($input['password']);
    //     } else {
    //         $input = array_except($input, array('password'));
    //     }
    //     $user = User::find($id);
    //     $user->update($input);
    //     DB::table('model_has_roles')->where('model_id', $id)->delete();
    //     $user->assignRole($request->input('roles'));
    //     return redirect()->route('listusers')
    //         ->with('success', 'تم تحديث معلومات المستخدم بنجاح');
    // }


    public function destroy($id)
    {
        $admin = Admin::find($id);
        if(isset($admin)){
            $user = User::where('id',$admin->user_id);
            $user->delete();
        }
        $admin->delete();
        return redirect()->route('adminlist')->with('done', 'delete this admin');
    }
}
