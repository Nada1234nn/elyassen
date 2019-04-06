<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        app()->singleton('lang',function(){
            if (session()->has('lang')){
                return session()->get('lang');
            }else{
                return 'ar';
            }
        });
        view()->composer('website.layouts.layout', 'App\Http\ViewComposers\HeaderComposer');

        //
        view()->composer(
            '*', 'App\Http\ViewComposers\MasterComposer'
        );

        Schema::defaultStringLength(191);

    }
}
