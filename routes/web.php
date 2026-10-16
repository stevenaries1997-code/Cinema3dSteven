<?php

use App\Http\Controllers\RegistroController;

Route::get('/', [RegistroController::class, 'index']);
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');
