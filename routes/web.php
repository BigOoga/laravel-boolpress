<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('guest.home');
});

//l Auth::routes(); automatically added by scaffolding
Auth::routes();

//Route::get('/home', 'Admin\HomeController@index')->name('home');

//l Routes that require authentication
//l The auth middleware prevents from accessing these routes and redirects to a specified page
//! Route->name() needs a dot to work

Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');


    //l We use Route::resource for CRUD models
    Route::resource('posts', 'PostController');
});


//l Route that handles ANY unhandled routes
Route::get("{any?}", function () {
    return view('guest.home');
})->where("any", ".*");





//l possible guest route grouping
// Route::namespace('Guest')->name('guest.')->prefix('guest')->group(function () {
//     Route::get('/', 'HomeController@index')->name('home');
// });
