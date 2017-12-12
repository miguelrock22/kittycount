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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'role:Administrador'])->group(function() {

	Route::get('/home', 'HomeController@index')->name('inicio');

	Route::resource('personas', 'PersonaController');
	Route::get('datatable/personas', 'PersonaController@datatable')->name('datatableper');

	Route::resource('codeudores', 'CodeudorController');
	Route::get('datatable/codeudores', 'CodeudorController@datatable')->name('datatablecod');

	Route::resource('referencias', 'ReferenciaController');
	Route::get('datatable/referencias', 'ReferenciaController@datatable')->name('datatableref');

	Route::resource('prestamos', 'PrestamoController');
	Route::get('datatable/prestamos', 'PrestamoController@datatable')->name('datatablepre');

	Route::resource('historiales', 'HistorialController');
    Route::get('datatable/historiales', 'HistorialController@datatable')->name('datatablehis');
});

Route::middleware(['auth', 'role:Cobrador'])->group(function() {

	Route::resource('cobros', 'CobrosController');
	
});;