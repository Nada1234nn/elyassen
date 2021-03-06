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

Route::get('/art', function () {


    \Illuminate\Support\Facades\Artisan::call('config:cache');
    //  \Illuminate\Support\Facades\Artisan::call('make:model',['name'=>'Join_us']);
});
Route::get('lang/{lang}', [
    "uses" => "HomeController@showLang",
    "as" => "website.lang"
]);
Route::group(['middleware' => 'lang'], function () {



    Route::group(['middleware' => 'web', 'guest'], function () {
        //services
        Route::get('/services', 'HomeController@services')->name('services');
//        Route::get('/consult-request', 'HomeController@consult_request')->name('consult_request');
        Route::view('/consult-request', 'website.consult_request')->name('consult_request');


        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/getSubcategories/{category_id}', 'admin\HomeController@getSubcategories');
        Route::get('/admin/login', 'Auth\LoginController@showLoginAdmin');

        Route::post('/loginAdmin', [
            "uses" => "Auth\LoginController@loginAdmin",
            "as" => "loginAdmin"
        ]);
        Route::post('/search_supplier', 'HomeController@search_supplier');
        Route::post('/search_prosupplier', 'HomeController@search_prosupplier');
        Route::post('/search_category', 'HomeController@search_category');
        Route::post('/searchpro_categories', 'HomeController@searchpro_categories');
        Route::post('/search_subcategory', 'HomeController@search_subcategory');
        Route::post('/search_prosubcategories', 'HomeController@search_prosubcategories');
        Route::post('/search_product', 'HomeController@search_product');
        Route::post('/share_product', 'HomeController@share_product');
        Route::post('/like_product', 'HomeController@like_product');
        Route::post('/remove_order', 'HomeController@remove_order');
        Route::post('/save_order', 'HomeController@save_order')->name('save_order');
        Route::post('/order_pro', 'HomeController@order_pro');
//tasira
        Route::post('/update_orders', 'HomeController@update_orders')->name('update_orders');
        Route::get('/detail_news/{title}', 'HomeController@detail_news')->name('website.detail_news');
        Route::get('/nnews', 'HomeController@news')->name('website.news');
        Route::get('/search_pro/{name}', 'HomeController@search_pro')->name('website.search_pro');
        Route::post('/search_news', 'HomeController@search_news');
        Route::post('/search_title', 'HomeController@search_title');
        Route::get('/supplier', 'HomeController@suppliers')->name('website.suppliers');
        Route::get('/about', 'HomeController@getAbout')->name('website.about');

        Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|google');
        Route::get('/login/{social/callback}', 'Auth\LoginController@handleprovidercallback')->where('social', 'twitter|facebook|google');
        Route::get('/contact', [
            "uses" => "HomeController@contact",
            "as" => "website.contact"
        ]);
        Route::get('/view_attach/{attachment_pro}', [
            "uses" => "HomeController@download",
            "as" => "website.viewAttach"
        ]);

        Route::get('/order_product', [
            "uses" => "HomeController@order_product",
            "as" => "website.order_product"
        ]);

        Route::get('/shopping_cart/{name}', [
            "uses" => "HomeController@shopping_cart",
            "as" => "website.shopping_cart"
        ]);

        Route::get('/product', [
            "uses" => "HomeController@getProduct",
            "as" => "website.product"
        ]);

        Route::get('/detail_product/{name}', [
            "uses" => "HomeController@detail_product",
            "as" => "website.detail_product"
        ]);
    });

    Route::group(['middleware' => ['web', 'auth'], 'perfix' => ''], function () {

        Route::get('/logout', [
            "uses" => "Auth\LoginController@logout",
            "as" => "logout"
        ]);
        Route::get('/documentaion_center', [
            "uses" => "HomeController@documentaion_center",
            "as" => "website.documentaion_center"
        ]);

        Route::get('/supplier_detail/{supplier_name}', [
            "uses" => "HomeController@supplier_detail",
            "as" => "website.detail_supplier"
        ]);
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/dashboard', [
            "uses" => "admin\HomeController@index",
            "as" => "dashboard"
        ]);
        Route::get('/category/{name}', [
            "uses" => "admin\CategoriesController@show",
            "as" => "category"
        ]);
        Route::get('/admins', [
            "uses" => "admin\UsersController@admins",
            "as" => "admins"
        ]);
        Route::get('/blocked', [
            "uses" => "admin\UsersController@blocked",
            "as" => "blocked"
        ]);
        Route::resource('/categories','admin\CategoriesController');
        Route::post('/deleteGroup/{id}', 'admin\CategoriesController@deleteGroup');
        Route::get('/admin_user/{user_id}', 'admin\UsersController@admin_user');
        Route::get('/block_user/{user_id}', 'admin\UsersController@block_user');

        Route::resource('/subcategories','admin\SubcategoriesController');
        Route::resource('/products','admin\ProductsController');
        Route::resource('/permissions','admin\PermissionsController');
        Route::resource('/suppliers', 'admin\SuppliersController');
        Route::resource('/systems', 'admin\SystemsController');
        Route::resource('/users', 'admin\UsersController');
        Route::resource('/news', 'admin\NewsController');
        Route::resource('/about_editcontent', 'admin\AboutEditContentController');
        Route::resource('/about_images', 'admin\AboutImagesController');
        Route::resource('/prize', 'admin\PrizeController');
        Route::resource('/dash_team', 'admin\DashTeamController');
        Route::resource('/employees', 'admin\EmployeesController');
        Route::get('/employeeFollowWork', 'admin\EmployeesController@efollow_work')->name('efollow_work');
        Route::get('/employeeControlSupplier', 'admin\EmployeesController@econtrol_supplier')->name('econtrol_supplier');
        Route::get('/employeeOrderProduct', 'admin\EmployeesController@eorderproduct')->name('eorderproduct');
        Route::get('/followWork/{id}', 'admin\EmployeesController@follow_work')->name('follow_work');
        Route::get('/controlSupplier/{id}', 'admin\EmployeesController@control_supplier')->name('control_supplier');
        Route::get('/receiveOrdersPro/{id}', 'admin\EmployeesController@receive_ordersPro')->name('receive_ordersPro');

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
