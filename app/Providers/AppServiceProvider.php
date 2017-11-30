<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
        ]);

        View::composer(['*.create', '*.edit'], function ($view) {
            $parentesco = [
                "Padre/Madre" => "Padre/Madre",
                "Herman@" => "Herman@" ,
                "Prim@" => "Prim@",
                "Abuel@" => "Abuel@",
                "Ti@" => "Ti@",
            ];
            View::share('parentesco', $parentesco);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
