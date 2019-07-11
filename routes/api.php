<?php


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

Route::post('login', 'API\UserController@login')->name("login");
Route::post('register', 'API\UserController@register')->name("register");
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('user', 'API\UserController@details');
});