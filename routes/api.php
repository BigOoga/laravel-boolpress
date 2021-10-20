<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//l Single route
//l Route::get('/posts', 'Api\PostController@index');


Route::namespace('Api')->group(function () {
    //l We can create all the CRUD routes manually as usual
    //Route::get('/posts', 'PostController@index');
    //Route::get('/posts/{post}', 'PostController@show');
    //Route::delete('/posts/{post}', 'PostController@destroy');
    //l Or use the Route::resource method
    Route::resource('posts', 'PostController');
});
