<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerProductPolicies();

        //
    }

    public function registerProductPolicies()
    {
        Gate::define('name_pro', function ($user) {
            if ($user->hasAccess('name_pro')) {
                return true;
            }
            return false;
        });

        Gate::define('supplier_pro', function ($user) {
            if ($user->hasAccess('supplier_pro')) {
                return true;
            }
            return false;
        });

        Gate::define('category_pro', function ($user) {
            if ($user->hasAccess('category_pro')) {
                return true;
            }
            return false;
        });

        Gate::define('descr_pro', function ($user) {
            if ($user->hasAccess('descr_pro')) {
                return true;
            }
            return false;
        });

        Gate::define('sorting_pro', function ($user) {
            if ($user->hasAccess('sorting_pro')) {
                return true;
            }
            return false;
        });

        Gate::define('weight_pro', function ($user) {
            if ($user->hasAccess('weight_pro')) {
                return true;
            }
            return false;
        });
    }
}
