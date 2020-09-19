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

// product routes
Route::post('/add','ProductController@add');
Route::get('/show','ProductController@show');
Route::get('/edit/{id}','ProductController@getDataById');
Route::any('update/{id}','ProductController@update');
Route::any('delete','ProductController@delete');


// user route
Route::any('regsiter','UserController@register');
Route::any('login','UserController@login');
