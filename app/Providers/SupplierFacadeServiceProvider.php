<?php

namespace App\Providers;

use App\Helpers\SupplierHelpers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SupplierFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        ////
        App::bind('supplier',function(){
            return new SupplierHelpers;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
