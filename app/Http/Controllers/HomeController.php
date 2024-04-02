<?php

namespace App\Http\Controllers;

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


    public function logout () {
        auth()->logout();
        return redirect('/');
    }
}
