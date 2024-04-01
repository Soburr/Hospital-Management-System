<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect () {
        if (Auth::id()) {
            if(Auth::user()->usertype=='0') {
               return view('user.index');
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
                $patient = Auth::user();

                $name = $patient->name;
                return view('user.index', ['name' => $name]);
             }
             else {
                $admin = Auth::user();

                $name = $admin->name;
                return view('admin.home', ['name' => $name]);
            }
        }
        // $patient = Auth::user();

        // $name = $patient->name;
        // return view('admin.home', ['name' => $name]);
    }

    public function logout () {
        auth()->logout();
        return redirect('/');
    }
}
