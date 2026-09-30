<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/catalogo', [PageController::class, 'catalog'])->name('catalog');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');