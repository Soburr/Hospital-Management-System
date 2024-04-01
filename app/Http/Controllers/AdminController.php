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

    }
}
