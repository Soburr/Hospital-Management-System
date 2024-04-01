<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adddocs () {
        return view('admin.add-doctors');
    }

    public function name () {
        $doctor = Auth::user();

        $name = $doctor->name;
        return view('admin.add-doctors', ['name' => $name]);
    }

    public function upload (Request $request) {

        $doctor = new Doctor;

        $image = $request->file;

        $imageName = time() . '-' . $image->getClientOriginalExtension();

        $test=$request->file->move(public_path('doctorimage'), $imageName);

        $doctor = Doctor::create([
            'name' => $request->input('name'),
            'number' => $request->input('number'),
            'room' => $request->input('room'),
            'speciality' => $request->input('speciality'),
            'image' => $imageName
        ]);

        return redirect()->back()->with('message', 'Doctor Has Been Added Successfully');

    }
}
