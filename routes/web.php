<?php
use App\Http\Controllers\AdminLTEController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Seccion1;
use Livewire\Livewire;

// Importa todas las clases Livewire
//Livewire::routes();
use App\Http\Controllers\RegistroAguaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\LecturaMedidorController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\QuejasTicketsController;
use App\Http\Controllers\AlertasAutomaticasController;
use App\Http\Controllers\FinanzasController;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\GenerarpdfController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRoles;



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
    return view('auth.login');
});
Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// aca estoy protegiendomlas rutas con spatie
Route::group(['middleware' => ['auth']],function() {

    Route::resource('roles', RoleController::class);
   // Route::resource('usuarios', UsuarioController::class);
    // Rutas para MantenimientoController
    
  
 });



// routes/web.php

Route::get('/obtener_ultima_lectura/{usuarioId}', 'App\Http\Controllers\LecturaMedidorController@obtenerUltimaLectura');



Route::get('/perfil', 'App\Http\Controllers\UserController@profile')->name('profile');  
Route::put('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');

Route::get('lecturas-generarpdf', 'App\Http\Controllers\LecturaMedidorController@excel')->name('lecturas.excel');  

Route::get('/lecturas/buscar', 'App\Http\Controllers\LecturaMedidorController@buscar')->name('lecturas.buscar');

// routes/web.php



// Rutas para RolController
//Route::resource('roles', RolController::class);

// Rutas para UsuarioController
Route::resource('usuarios', UsuarioController::class);

// Rutas para FacturaController
Route::resource('facturas', FacturaController::class);
// routes/web.php
//Route::get('facturas/{factura}', 'FacturaController@show')->name('facturas.show');





Route::get('alertas-reporte', 'App\Http\Controllers\AlertasAutomaticasController@reporte')->name('alertas.reporte'); 
Route::resource('registro-agua', RegistroAguaController::class);
Route::get('registro-agua-reporte', 'App\Http\Controllers\RegistroAguaController@reporte')->name('registro-agua.reporte'); 
// Rutas para FinanzasController


// Rutas para cambio de contrase;a
Route::get('cambiar-password', 'App\Http\Controllers\UsuarioController@showChangePasswordForm')->name('change-password-form');
Route::post('cambiar-password', 'App\Http\Controllers\UsuarioController@changePassword')->name('change-password');

// Ruta para descargar en formato pdf 
Route::get('/usuarios/pdf', 'App\Http\Controllers\UsuarioController@downloadPDF')->name('usuarios.pdf');
// Ruta para descargar en formato SQL
Route::get('/usuarios/sql', 'App\Http\Controllers\UsuarioController@downloadSQL')->name('usuarios.sql');

Route::get('/usuarios/export-csv', 'App\Http\Controllers\UsuarioController@exportCSV')->name('usuarios.export-csv');

// Rutas para livewire de las vistas  registro-agua-table y  create-agua-form
\Livewire\Livewire::component('registro-agua-table', \App\Http\Livewire\RegistroAguaTable::class);

// web.php


// Rutas para roles
Route::resource('roles', RoleController::class);

Route::resource('usuarios_roles', UserRoles::class);


use App\Http\Controllers\IngresoController;
use App\Http\Controllers\GastoController;

// Rutas para Ingresos
Route::resource('ingresos', IngresoController::class);



