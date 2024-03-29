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

    public function about () {
        return view('user.about');
    }

    public function doctors () {
        return view('user.doctors');
    }

    public function blog () {
        return view('user.blog');
    }

    public function contact () {
        return view('user.contact');
    }

    public function logout () {
        auth()->logout();
        return redirect('/');
    }
}
