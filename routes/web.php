<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\AdministradorController::class, 'login'])->name('login');
Route::prefix('administrador')->middleware(['auth'])->group(function () {
    Route::get('', [App\Http\Controllers\AdministradorController::class, 'index'])->name('admin.index');
    Route::get('/registro', [App\Http\Controllers\VehiculoController::class, 'index'])->name('admin.vehiculo.index');
    Route::get('/control', [App\Http\Controllers\ControlController::class, 'index'])->name('admin.control.index');
    Route::get('/reportes', [App\Http\Controllers\ControlController::class, 'index'])->name('admin.reportes.index');
});
