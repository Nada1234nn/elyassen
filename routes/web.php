<?php

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


use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('lang/{lang}', 'HomeController@showLang');
Route::group(['middleware' => 'lang'], function () {

    Route::group(['middleware' => ['web', 'guest'], 'perfix' => ''], function () {

    });

 Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social','twitter|facebook|google');
    Route::get('/login/{social/callback}', 'Auth\LoginController@handleprovidercallback')->where('social','twitter|facebook|google');

});

    Route::group(['middleware' => ['web', 'auth'], 'perfix' => ''], function () {
        Route::get('/logout', 'Auth\LoginController@logout');

    });

    });

//add permission to role in route