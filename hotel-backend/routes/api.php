<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ActivityController;

// Rota de login
Route::post('/login', [AuthController::class, 'login']);

// Rota de cadastro
Route::post('/register', [AuthController::class, 'register']);

// Rotas protegidas por autenticação (exemplo, adicione middleware depois)
Route::middleware('auth:sanctum')->group(function () {
    // Dashboard (exemplo de rota protegida)
    Route::get('/dashboard', [UserController::class, 'dashboard']);

    // Hotéis
    Route::get('/hotels', [HotelController::class, 'index']);
    Route::post('/hotels', [HotelController::class, 'store']);
    Route::get('/hotels/{id}', [HotelController::class, 'show']);
    Route::put('/hotels/{id}', [HotelController::class, 'update']);
    Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);

    // Quartos
    Route::get('/hotels/{hotel}/rooms', [RoomController::class, 'index']);
    Route::post('/hotels/{hotel}/rooms', [RoomController::class, 'store']);
    Route::get('/rooms/{id}', [RoomController::class, 'show']);
    Route::put('/rooms/{id}', [RoomController::class, 'update']);
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy']);

    // Atividades
    Route::get('/activities', [ActivityController::class, 'index']);
    Route::get('/activities/realtime', [ActivityController::class, 'realtime']);

    // Usuário logado
    Route::get('/me', [UserController::class, 'me']);
});
