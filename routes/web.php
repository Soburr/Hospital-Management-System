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

    return view('user.index');
});

Route::middleware('auth')->get('/home', 'App\Http\Controllers\HomeController@redirect')->name('home');
Route::middleware('auth')->get('/about', 'App\Http\Controllers\HomeController@about')->name('about');
Route::middleware('auth')->get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');
Route::middleware('auth')->get('/blog', 'App\Http\Controllers\HomeController@blog')->name('blog');
Route::middleware('auth')->get('/doctors', 'App\Http\Controllers\HomeController@doctors')->name('doctors');
Route::middleware('auth')->get('/logout', 'App\Http\Controllers\HomeController@logout')->name('logout');
