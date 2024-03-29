<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::get('/home', 'App\Http\Controllers\HomeController@redirect');

Route::get('/', function() {
    if(Auth::check()) {
         return redirect()->route('/home');
    }

    return view('welcome');
});

Route::middleware('auth')->get('/home', 'App\Http\Controllers\HomeController@redirect')->name('home');

