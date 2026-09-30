<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/login', [UserController::class, 'login']);
Route::put('/users/username', [UserController::class, 'updateUsername']);
Route::put('/users/email', [UserController::class, 'updateEmail']);
Route::put('/users/password', [UserController::class, 'updatePassword']);
Route::delete('/users', [UserController::class, 'destroy']);