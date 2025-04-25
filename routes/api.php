<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProduccionController;
use App\Http\Controllers\Api\GastoController;
use App\Http\Controllers\Api\MortandadController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\GalponController;

Route::middleware('api')->group(function () {
    // Ruta de prueba pública
    Route::get('/test-api', function () {
        return response()->json(['message' => 'API funcionando correctamente']);
    });

    // Login (acceso sin token)
    Route::post('/login', [AuthController::class, 'login']);

    // Rutas protegidas por token
    Route::middleware('auth:sanctum')->group(function () {
        // Endpoint para validar token y obtener datos del usuario
        Route::get('/user', function (Request $request) {
            return response()->json($request->user());
        });

        // Logout
        Route::post('/logout', [AuthController::class, 'logout']);

        // Producciones
        Route::post('/producciones', [ProduccionController::class, 'store']);
        Route::get('/producciones', [ProduccionController::class, 'index']);

        // Gastos
        Route::post('/gastos', [GastoController::class, 'store']);
        Route::get('/gastos', [GastoController::class, 'index']);

        // Mortandades
        Route::post('/mortandades', [MortandadController::class, 'store']);
        Route::get('/mortandades', [MortandadController::class, 'index']);

        // Stocks
        Route::post('/stocks', [StockController::class, 'store']);
        Route::get('/stocks', [StockController::class, 'index']);

        // Galpones
        Route::get('/galpones', [GalponController::class, 'index']);
    });
});
