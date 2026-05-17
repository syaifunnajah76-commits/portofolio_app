<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('welcome');
})->name('beranda');

Route::get('/karya', [KaryaController::class, 'index'])->name('karya.index');
Route::get('/karya/create', [KaryaController::class, 'create'])->name('karya.create'); // <-- Statis di atas
Route::post('/karya', [KaryaController::class, 'store'])->name('karya.store'); // <-- URL lebih bersih
Route::get('/karya/{id}', [KaryaController::class, 'show'])->name('karya.show'); // <-- Dinamis di bawah
Route::get('/karya/{id}/edit', [KaryaController::class, 'edit'])->name('karya.edit');
Route::put('/karya/{id}', [KaryaController::class, 'update'])->name('karya.update');
Route::delete('/karya/{id}', [KaryaController::class, 'destroy'])->name('karya.destroy');
