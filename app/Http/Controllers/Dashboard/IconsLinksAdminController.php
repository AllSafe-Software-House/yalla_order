<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\IconsLinks;
use Illuminate\Http\Request;
use App\Http\Requests\IconMediaRequest;
use App\Http\Requests\IconupdateRequest;
use App\Http\Controllers\Controller;

class IconsLinksAdminController extends Controller
{
    public function index()
    {
        $iconmedia = IconsLinks::all();
        return view('IconMedia/IconMedia_all',compact('iconmedia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('IconMedia/IconMedia_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IconMediaRequest $request)
    {
        $classname = $request->classname;
        $lenth = strlen($classname);
        $name = substr($classname, 3);
        IconsLinks::create([
            "classname" => $classname ,
            "link" => $request->link,
            "name" => $name
        ]);
        return redirect()->route('iconmedialist')->with('done','add socail media sucessfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $iconmedia = IconsLinks::find($id);
        return view('IconMedia/IconMedia_edit',compact('iconmedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IconupdateRequest $request, $id)
    {
        $classname = $request->classname;
        $lenth = strlen($classname);
        $name = substr($classname, 3);
        $existingIconmedia = IconsLinks::where('name', $name)->where('id', '!=', $id)->first();

        if ($existingIconmedia) {
            return redirect()->back()->with('error', 'The name extracted from the classname is already in use.');
        }
        $iconmedia = IconsLinks::find($id);
        $iconmedia->classname = $classname;
        $iconmedia->link = $request->link;
        $iconmedia->name = $name;
        $iconmedia->save();
        return redirect()->route('iconmedialist')->with('done','update socail media sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $iconmedia = IconsLinks::find($id);
        $iconmedia->delete();
        return redirect()->route('iconmedialist')->with('fail','delete socail media sucessfully');
    }
}
