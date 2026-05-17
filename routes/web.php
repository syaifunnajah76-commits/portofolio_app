<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('welcome');
})->name('beranda');

Route::get('/karya', [App\Http\Controllers\KaryaController::class, 'index'])->name('karya.index');
Route::get('/karya/{id}', [App\Http\Controllers\KaryaController::class, 'show'])->name('karya.show');
Route::get('/karya/create', [App\Http\Controllers\KaryaController::class, 'create'])->name('karya.create');
Route::post('/karya/store', [App\Http\Controllers\KaryaController::class, 'store'])->name('karya.store');
Route::get('/karya/{id}/edit', [App\Http\Controllers\KaryaController::class, 'edit'])->name('karya.edit');
Route::put('/karya/{id}', [App\Http\Controllers\KaryaController::class, 'update'])->name('karya.update');
Route::delete('/karya/{id}', [App\Http\Controllers\KaryaController::class, 'destroy'])->name('karya.destroy');
