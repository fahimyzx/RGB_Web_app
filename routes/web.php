<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RgbObjectController;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Breeze auth routes (login, register, etc.)
require __DIR__.'/auth.php';

// Protected routes (only accessible after login)
Route::middleware(['auth'])->group(function () {

    // Dashboard view
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD routes for RGB Object model
    Route::resource('rgb-objects', RgbObjectController::class);

    // 🔄 RGB Search route - changed to POST
    Route::post('/rgb-objects/search', [RgbObjectController::class, 'search'])->name('rgb.search');
});
