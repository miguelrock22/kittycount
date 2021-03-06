<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\Persona;
use App\Models\Codeudor;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //compatibility with MySQL 5.5
        Schema::defaultStringLength(191);
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
        ]);
        URL::forceScheme('http');

        View::composer(['*.create', '*.edit'], function ($view) {
            $parentesco = [
                "Padre/Madre" => "Padre/Madre",
                "Herman@" => "Herman@" ,
                "Prim@" => "Prim@",
                "Abuel@" => "Abuel@",
                "Ti@" => "Ti@",
                "Hij@" => "Hij@",
                "Cuñad@" => "Cuñad@",
            ];
            $personas = Persona::select(DB::raw("CONCAT(cedula,' ',nombres) AS cedula"),'id')
                ->where('user_id',Auth::id())
                ->pluck('cedula', 'id');
            View::share('parentesco', $parentesco);
            View::share('personas', $personas);
        });

        View::composer(['prestamos.create', 'prestamos.edit','historiales.create','historiales.edit'], function ($view) {
            $movil = User::role('Cobrador')->pluck('name','id');
            View::share('movil', $movil);
        });
        View::composer(['referencias.create', 'referencias.edit'], function ($view) {
            $codeudor = Codeudor::where('user_id',Auth::id())->pluck('cedula', 'id');
            View::share('codeudor', $codeudor);
        });
        View::composer(['usuarios.create','usuarios.edit'],function($view){
            $roles = $roles = \Spatie\Permission\Models\Role::pluck('name','id');
            View::share('roles',$roles);
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
