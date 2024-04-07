<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adddocs()
    {
        return view('admin.add-doctors');
    }

    public function name()
    {
        $doctor = Auth::user();

        $name = $doctor->name;
        return view('admin.add-doctors', ['name' => $name]);
    }

    public function upload(Request $request)
    {

        $doctor = new Doctor;

        $image = $request->file;

        $imageName = time() . '-' . $image->getClientOriginalExtension();

        $request->file->move(public_path('doctorimage'), $imageName);

        $doctor = Doctor::create([
            'name' => $request->input('name'),
            'number' => $request->input('number'),
            'room' => $request->input('room'),
            'speciality' => $request->input('speciality'),
            'image' => $imageName
        ]);

        return redirect()->back()->with('message', 'Doctor Has Been Added Successfully');
    }

    public function show_appointment() {

        $admin = Auth::user();

        $name = $admin->name;
        $data = Appointment::all();
        return view('admin.show-appointment', ['data' => $data, 'name' => $name]);
    }

    public function approve ($id) {

        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();

        return redirect()->back();
    }

    public function cancel ($id) {

        $data = Appointment::find($id);
        $data->status = 'Cancelled';
        $data->save();

        return redirect()->back();
    }

    public function show_doctors () {
        $admin = Auth::user();
        $name = $admin->name;

        $data = Doctor::all();
        return view('admin.show-doctors', ['admin' => $admin, 'name' => $name, 'data' => $data]);
    }

    public function update ($id) {
        $admin = Auth::user();
        $name = $admin->name;

        $data = Doctor::findOrFail($id);
        return view('admin.update-doctor', ['admin' => $admin, 'name' => $name, 'data' => $data]);

    }

    public function editdoctor (Request $request, $id) {

        $doctor = Doctor::findOrFail($id);

        $doctor->name = $request->name;
        $doctor->number = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;

        if ($image) {

            $imagename = time() . '-' . $image->getClientOriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $doctor->image = $imagename;
        }

        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Updated Successfully');
    }

    public function delete_doctor ($id) {

        $data = Doctor::findOrFail($id);
        $data->delete();

      return redirect()->back();

    }

}
