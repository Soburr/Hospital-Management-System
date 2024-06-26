<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AboutController;


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


Route::get('/', function() {
    if(Auth::check()) {
         return redirect()->route('/home');
    }

    return view('user.index');
});

Route::get('/home', 'App\Http\Controllers\HomeController@redirect')->name('home')->middleware('auth', 'verified');
Route::middleware('auth')->get('/home', 'App\Http\Controllers\HomeController@name');
Route::get('/', 'App\Http\Controllers\HomeController@docview');

Route::middleware('auth')->get('/about', 'App\Http\Controllers\AboutController@about')->name('about');
Route::middleware('auth')->get('/contact', 'App\Http\Controllers\ContactController@contact')->name('contact');
Route::middleware('auth')->get('/blog', 'App\Http\Controllers\BlogController@blog')->name('blog');
Route::middleware('auth')->get('/doctors', 'App\Http\Controllers\DoctorController@doctors')->name('doctors');

Route::middleware('auth')->get('/logout', 'App\Http\Controllers\HomeController@logout')->name('logout');

Route::middleware('auth')->get('/add-doctors', 'App\Http\Controllers\AdminController@adddocs')->name('add-doctors');
Route::middleware('auth')->get('/add-doctors', 'App\Http\Controllers\AdminController@name');

Route::middleware('auth')->post('/upload-doctor', 'App\Http\Controllers\AdminController@upload');

Route::middleware('auth')->post('/appointment', 'App\Http\Controllers\HomeController@appointment');
Route::get('/my-appointment', 'App\Http\Controllers\HomeController@my_appointment');
Route::get('/cancel-appointment/{id}', 'App\Http\Controllers\HomeController@cancel_appointment');

Route::middleware('auth')->get('/show-appointment', 'App\Http\Controllers\AdminController@show_appointment');

Route::get('/approve/{id}', 'App\Http\Controllers\AdminController@approve');
Route::get('/cancel/{id}', 'App\Http\Controllers\AdminController@cancel');

Route::middleware('auth')->get('/show-doctors', 'App\Http\Controllers\AdminController@show_doctors');
Route::get('/update-doctor/{id}', 'App\Http\Controllers\AdminController@update');
Route::post('/editdoctor/{id}', 'App\Http\Controllers\AdminController@editdoctor');

Route::get('/delete-doctor/{id}', 'App\Http\Controllers\AdminController@delete_doctor');
