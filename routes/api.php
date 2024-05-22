<?php

use App\Http\Controllers\api\CitaController;
use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\EmpleadoController;
use App\Http\Controllers\api\ProductoController;
use App\Http\Controllers\api\ServicioController;
use App\Http\Controllers\api\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/citas', [CitaController::class, 'index'])->name('citas');
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store'); 
Route::delete('/citas/{cita}', [CitaController::class, 'destroy'])->name('citas.destroy');
Route::put('/citas/{cita}', [CitaController::class, 'update'])->name('citas.update');
Route::get('/citas/{cita}', [CitaController::class , 'show'])->name('citas.show');

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store'); 
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::get('/clientes/{cliente}', [ClienteController::class , 'show'])->name('clientes.show');

Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store'); 
Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
Route::get('/empleados/{empleado}', [EmpleadoController::class , 'show'])->name('empleados.show');

Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios');
Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store'); 
Route::delete('/servicios/{servicio}', [ServicioController::class, 'destroy'])->name('servicios.destroy');
Route::put('/servicios/{servicio}', [ServicioController::class, 'update'])->name('servicios.update');
Route::get('/servicios/{servicio}', [ServicioController::class , 'show'])->name('servicios.show');

Route::get('/ventas', [VentaController::class, 'index'])->name('ventas');
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store'); 
Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');
Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
Route::get('/ventas/{venta}', [VentaController::class , 'show'])->name('ventas.show');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos');






