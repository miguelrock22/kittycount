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

	Route::resource('codeudores', 'CodeudorController');

	Route::resource('referencias', 'ReferenciaController');
	Route::get('datatable/referencias', 'ReferenciaController@datatable')->name('datatableref');

	Route::resource('prestamos', 'PrestamoController');

	Route::resource('historiales', 'HistorialController');
});

Route::middleware(['auth', 'role:Cobrador'])->group(function() {

	Route::resource('cobros', 'CobrosController');
	
});;