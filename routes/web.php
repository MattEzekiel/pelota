<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MundialesController;
use App\Http\Controllers\PelotasController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\TorneosController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/gracias', [HomeController::class, 'gracias'])->name('gracias');

Route::get('/login',[AuthController::class, 'loginForm'])->name('auth.login-form');
Route::get('/registrarse',[AuthController::class, 'registroForm'])->name('auth.registrarse-form');
Route::get('/logout',[AuthController::class, 'logout'])->name('auth.logout');

Route::post('/login',[AuthController::class, 'login'])->name('auth.login');
Route::post('/registrarse',[AuthController::class, 'registrarse'])->name('auth.registrarse');

Route::prefix('/pelotas')->group(function (){

    Route::middleware(['auth.admin'])->group(function () {

        Route::get('/', [PelotasController::class, 'index'])->name('pelotas.index');

        Route::get('/{pelota}', [PelotasController::class, 'ver'])
            ->name('pelotas.ver')
            ->whereNumber('pelota');

        Route::get('/nueva', [PelotasController::class, 'nuevaForm'])
            ->name('pelotas.nueva-form')->middleware(['auth']);

        Route::get('/ordenes', [PelotasController::class, 'ordenes'])
            ->name('pelotas.ordenes')->middleware(['auth.admin']);

        Route::post('/nueva', [PelotasController::class, 'crear'])->name('pelotas.crear')->middleware(['auth']);


        Route::get('/{pelota}/editar',[PelotasController::class, 'editarForm'])->name('pelotas.editarForm')->middleware(['auth']);

        Route::put('/{pelota}/editar',[PelotasController::class, 'editar'])->name('pelotas.editar')->middleware(['auth']);

        Route::put('/{pelota}/restaurar',[PelotasController::class, 'restaurar'])->name('pelotas.restaurar')->middleware(['auth']);

        Route::delete('/{pelota}/eliminar',[PelotasController::class, 'eliminar'])->name('pelotas.eliminar')->middleware(['auth']);
    });

});

Route::prefix('/perfil')->group(function (){

    Route::middleware('auth')->group(function () {

        Route::get('/', [PerfilController::class, 'index'])->name('perfil.index');

        Route::get('/{usuario}/editar',[PerfilController::class, 'editarPerfil'])->name('perfil.editarPerfil')->middleware(['auth']);

        Route::put('/{usuario}/editar',[PerfilController::class, 'editar'])->name('perfil.editar')->middleware(['auth']);

    });
});

//Mundiales
Route::prefix('/mundiales')->group(function (){

    Route::get('/', [MundialesController::class, 'index'])->name('mundiales.index');

});

//Torneos
Route::prefix('/torneos')->group(function (){

    Route::get('/', [TorneosController::class, 'index'])->name('torneos.index');

});

//Tienda
Route::prefix('/tienda')->group(function (){

    Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');

    Route::get('/agregar/{id}', [TiendaController::class,'addCarrito'])->name('tienda.carrito')->whereNumber('id');

    Route::get('/reducir/{id}', [TiendaController::class,'getReduceByOne'])->name('tienda.reduceByOne')->whereNumber('id');

    Route::get('/add/{id}', [TiendaController::class,'getAddByOne'])->name('tienda.addByOne')->whereNumber('id');

    Route::get('/quitar/{id}', [TiendaController::class,'removerPelota'])->name('tienda.removePelota')->whereNumber('id');

    Route::get('/carrito', [TiendaController::class,'getCarrito'])->name('tienda.shoppingCarrito');

    Route::get('/checkout', [TiendaController::class,'checkout'])->name('tienda.checkout');

    Route::get('/procesando', [TiendaController::class,'procesando'])->name('tienda.procesando');

    Route::get('/{pelota}', [TiendaController::class, 'ver'])
        ->name('tienda.detalle')
        ->whereNumber('pelota');

    Route::post('/checkout', [TiendaController::class,'postCheckout'])->name('tienda.postCheckout')->middleware(['auth']);

});
