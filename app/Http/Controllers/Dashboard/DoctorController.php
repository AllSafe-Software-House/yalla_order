<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctores;
use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function storelogo($request){
        $nameimage = $request->logo;
        $place = $request->place;
        if (isset($nameimage)) {
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Doctors/$image";
            $request->logo->move(public_path('uploads/Doctors'), $image);
        } else {
            $imagepath = "uploads/Doctors/icons8-doctor-94.png";

        }
        return $imagepath;
    }

    public function updatelogo($request , $id){
        $doctor = Doctores::find($id);
        if (isset($request->logo)) {
            if (isset($doctor->image)) {
                $oldimage = $request->logo;
                $pathimage = "uploads/Doctors/$oldimage";
                Storage::disk('uploads')->delete($pathimage);
            }
            $image = time() . '.' . $request->logo->extension();
            $imagepath =  "uploads/Doctors/$image";
            $request->logo->move(public_path('uploads/Doctors'), $image);
        } else {
            $imagepath = $doctor->image;
        }
        return $imagepath;
    }

    public function index($id)
    {
        $admin = Auth::user();
        $doctor = Doctores::where('place_id', $id)->get();
        $clinic = Places::find($id);
        return view('Clinic.Doctor.list', compact('doctor', 'admin', 'clinic'));
    }


    public function create($id)
    {
        $clinic = Places::find($id);
        $daysOfWeek = ["Sat", "Sun", "Mon", "Tu", "We", "Th", "Fri"];
        return view('Clinic.Doctor.create', compact('clinic'));
    }

    public function store(DoctorRequest $request)
    {
        $days = $request->days;
        $imagepath = $this->storelogo($request);
        $doctor = Doctores::create([
            'name' => [
                "en" => $request->name,
                "ar" => $request->name_ar,
            ],
            'department' => [
                "en" => $request->department,
                "ar" => $request->department_ar,
            ],
            'place_id' => $request->place_id,
            'starttime' => $request->starttime,
            'endtime' => $request->endtime,
            'dayes' => json_encode($days),
            'price_fees' => $request->price_fees,
            'time' => $request->time,
            'overview' => [
                "en" => $request->overview,
                "ar" => $request->overview_ar,
            ],
            'image' => $imagepath,
            'sale' =>$request->sale,
            'wait' => $request->wait
        ]);

        return redirect()->route('doctorlist', $request->place_id)->with('done', 'add sucessful');
    }


    public function edit($id)
    {
        $doctors = Doctores::find($id);
        $daysOfWeek = ["Sat", "Sun", "Mon", "Tu", "We", "Th", "Fri"];
        $clinic = Places::where('id',$doctors->place_id)->first();
        return view('Clinic.Doctor.edit', compact('doctors','clinic','daysOfWeek'));
    }


    public function update(Request $request, $id)
    {
        $doctor = Doctores::find($id);
        $imagepath = $this->updatelogo($request,$id);
        $days = $request->days;
        if($days){
            $doctor->dayes = json_encode($days);
        }else{
            $doctor->dayes = $doctor->dayes;
        }
        $doctor->name = [
            "en" => $request->name,
            "ar" => $request->name_ar,
        ];
        $doctor->department = [
            "en" => $request->department,
            "ar" => $request->department_ar,
        ];
        $doctor->place_id = $request->place_id;
        $doctor->starttime = $request->starttime;
        $doctor->endtime = $request->endtime;
        $doctor->price_fees = $request->price_fees;
        $doctor->time = $request->time;
        $doctor->overview = [
            "en" => $request->overview,
            "ar" => $request->overview_ar,
        ];
        $doctor->image = $imagepath;
        $doctor->sale = $request->sale;
        $doctor->wait = $request->wait;

        $doctor->save();
        return redirect()->route('doctorlist', $request->place_id)->with('done', "update sucessfully");
    }


    public function destroy($id)
    {
        $doctor = Doctores::where('id', $id)->first();
        if(isset($doctor->image)) {
            if($doctor->image != 'uploads/Doctors/icons8-doctor-94.png'){
                unlink($doctor->image);
            }
        }
        $doctor->delete();
        return redirect()->route('doctorlist', $doctor->place_id)->with('done', "deleting sucessful");
    }
}
