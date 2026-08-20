<?php

use App\Http\Controllers\Autenticacion\ControladorInicioSesion;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\TaxiController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [ControladorInicioSesion::class, 'create'])->name('iniciar-sesion');
    Route::post('/iniciar-sesion', [ControladorInicioSesion::class, 'store'])->name('iniciar-sesion.guardar');
});

Route::middleware('auth')->group(function () {
    Route::get('/panel-principal', [PanelController::class, 'index'])->name('panel');

    Route::resources([
        'socios' => SocioController::class,
        'conductores' => ConductorController::class,
        'taxis' => TaxiController::class,
        'clientes' => ClienteController::class,
        'servicios' => ServicioController::class,
        'pagos' => PagoController::class,
    ]);

    Route::post('/cerrar-sesion', [ControladorInicioSesion::class, 'destroy'])->name('cerrar-sesion');
});
