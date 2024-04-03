<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect () {
        if (Auth::id()) {
            if(Auth::user()->usertype=='0') {
                $doctors = Doctor::all();
               return view('user.index', ['doctors' => $doctors]);
            }
            else {
                return view('admin.home');
            }
        }
        else {
            return redirect()->back();
         }
    }

    public function name () {
        if (Auth::id()) {
            if(Auth::user()->usertype=='0') {
                $doctors = Doctor::all();
                $patient = Auth::user();

                $name = $patient->name;
                return view('user.index', ['name' => $name, 'doctors' => $doctors]);
             }
             else {
                $admin = Auth::user();

                $name = $admin->name;
                return view('admin.home', ['name' => $name]);
            }
        }
    }


    public function docview () {
        $doctors = Doctor::all();

        return view('user.index', ['doctors' => $doctors]);
    }

    public function appointment (Request $request) {
       $validatedData = $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|max:255|email',
          'date' => 'required|string|max:255|date',
          'doctor' => 'required',
          'number' => 'required|string|max:255',
          'message' => 'required|string|max:255',
          'status' => 'Is Pending',
          'user_id' => 'required|exists:user_id',
       ]);

       $appointment = new Appointment([
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'date' => $request->input('date'),
           'doctor' => $request->input('doctor'),
           'number' => $request->input('number'),
           'message' => $request->input('message'),
        //    'status' => $request->input('status'),
        //    'user_id' => $request->input('user_id')
       ]);

       $appointment->save();

       return redirect('/home')->with('success', 'Appointment Made Successfully');
    }

    public function logout () {
        auth()->logout();
        return redirect('/');
    }
}
