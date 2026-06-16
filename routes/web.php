<?php

use App\Http\Controllers\AddonController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'landing'])->name('landing');

Route::prefix('addons')->name('addons.')->group(function () {
    Route::get('/', [AddonController::class, 'index'])->name('index');
    Route::get('/{slug}', [AddonController::class, 'show'])->name('show');
});

Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/about', [PageController::class, 'about'])->name('about');
