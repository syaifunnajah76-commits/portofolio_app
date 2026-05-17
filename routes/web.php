<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\CategoryController;

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


Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [CategoryController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [CategoryController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [CategoryController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('kategori.destroy');

