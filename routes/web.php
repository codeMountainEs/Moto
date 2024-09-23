<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('motos', [\App\Http\Controllers\MotoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('motos');


require __DIR__.'/auth.php';
