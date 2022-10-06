<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TiendasController;

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

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});


Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>['auth']], function (){
    //Ruta para acceso a CRUD de roles.
    Route::resource('roles', RolController::class);
    //Ruta para acceso a CRUD de usuarios.
    Route::resource('usuarios', UsersController::class);
    //Ruta para acceso a CRUD de tiendas.
    Route::resource('tiendas', TiendasController::class);
    //Ruta para crear tiendas
    Route::post('creartienda', [App\Http\Controllers\TiendasController::class, 'store'])->name('creartienda');
    //Ruta para mostrar formulario de subida de excel de ordenes de compra.
    Route::get('subiroc', [App\Http\Controllers\SubirArchivosController::class, 'vistaOC'])->name('subiroc');
    //Guardar los datos de excel en la base de datos
    Route::post('enviarexcel', [App\Http\Controllers\SubirArchivosController::class, 'importDatos'])->name('enviarexcel');
    //Vista para ver los reportes de ordenes de compra.
    Route::get('verreporteoc', [App\Http\Controllers\VerReporteController::class, 'verReportes'])->name('verreporteoc');
    //Editar un registro de las ordenes de compra.
    Route::post('editaroc' , [App\Http\Controllers\EditarRegistrosController::class, 'editaroc'])->name('editaroc');
    //Ruta para mostrar formulario de subida de excel de archivo general de carga
    Route::get('vistaocg',[App\Http\Controllers\SubirArchivosController::class, 'vistaocg'])->name('vistaocg');
    //Guardar los datos de archivo general de carga en la base de datos
    Route::post('enviarexcelocg', [App\Http\Controllers\SubirArchivosController::class, 'enviarexcelocg'])->name('enviarexcelocg');
    //Vista para ver los reportes generales de carga
    Route::get('verReportesOcg', [App\Http\Controllers\VerReporteController::class, 'verReportesOcg'])->name('verReportesOcg');
    //Entrar a la subida de pagos.
    Route::get('vistaPagos', [App\Http\Controllers\SubirArchivosController::class, 'vistaPagos'])->name('vistaPagos');
    //Guardar los datos de os pagos (facturas)
    Route::post('enviarexcelpagos', [App\Http\Controllers\SubirArchivosController::class, 'enviarexcelpagos'])->name('enviarexcelpagos');
    //Ver reportes de pagos
    Route::get('verReportePagos', [App\Http\Controllers\VerReporteController::class, 'verReportePagos'])->name('verReportePagos');
    //Ver reportes de acalaraciones
    Route::get('verReporteAclaraciones',[App\Http\Controllers\VerReporteController::class, 'verReporteAclaraciones'])->name('verReporteAclaraciones');
});

