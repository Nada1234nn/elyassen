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
        Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|google');
        Route::get('/login/{social/callback}', 'Auth\LoginController@handleprovidercallback')->where('social', 'twitter|facebook|google');
        Route::get('/contact', [
            "uses" => "HomeController@contact",
            "as" => "website.contact"
        ]);
    });

    Route::group(['middleware' => ['web', 'auth'], 'perfix' => ''], function () {
        Route::get('/logout', 'Auth\LoginController@logout');

    });

    Route::group(['middleware' => ['web','permission'], 'permission' => ['admin']], function () {
        Route::get('/dashboard', 'admin\HomeController@index');

    });
    Route::group(['middleware' => 'permission', 'permission' => ['visitor']], function () {

    });

    Route::group(['middleware' => 'permission', 'permission' => ['customer']], function () {

    });

    Route::group(['middleware'=>'permission','permission'=>['suppliers']],function () {

    });

    Route::group(['middleware'=>'permission','permission'=>['employees']],function () {

    });
    });
//add permission to role in route
Route::post('/contactUs', 'HomeController@contactUs');
Route::post('/malingList', 'HomeController@malingList');
