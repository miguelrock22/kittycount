<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\Persona;
use App\User;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
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

            $personas = Persona::pluck('cedula', 'id');
            View::share('parentesco', $parentesco);
            View::share('personas', $personas);
        });

        View::composer(['prestamos.create', 'prestamos.edit'], function ($view) {
            $movil = User::where('rol_id',2)->pluck('name','id');
            View::share('movil', $movil);
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
