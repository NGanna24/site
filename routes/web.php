<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'accueil'])->name('accueil');
Route::get('/services/migban', [PagesController::class, 'serviceDetail'])->name('services.detail');

require __DIR__.'/auth.php';