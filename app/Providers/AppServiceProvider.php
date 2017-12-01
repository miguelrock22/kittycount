<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\Persona;

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
            $personas = array();
            $parentesco = [
                "Padre/Madre" => "Padre/Madre",
                "Herman@" => "Herman@" ,
                "Prim@" => "Prim@",
                "Abuel@" => "Abuel@",
                "Ti@" => "Ti@",
            ];

            $result = Persona::all(['id','cedula'])->toArray();
            foreach($result as $p){
                $personas[$p['id']]=$p['cedula']; 
            }
            //dd($personas);
            View::share('parentesco', $parentesco);
            View::share('personas', $personas);
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
