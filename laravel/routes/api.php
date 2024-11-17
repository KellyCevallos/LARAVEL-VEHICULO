<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use Illuminate\Contracts\Cache\Store;

Route::get('vehiculo', [VehiculoController::class. 'index']);
Route::post('vehiculo', [VehiculoController::class, 'store']);
Route::get('vehiculo/{id}', [VehiculoController::class, 'show']);
Route::put('vehiculo/{id}', [VehiculoController::class, 'update']);
Route::delete('vehiculo/{id}', [VehiculoController::class, 'destroy']);
