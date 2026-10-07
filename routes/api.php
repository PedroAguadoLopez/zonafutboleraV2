<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/users', [ApiController::class, 'getTopUsers']);
Route::post('/users', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/users/name', [ApiController::class, 'updateName']);