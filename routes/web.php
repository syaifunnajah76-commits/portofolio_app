<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('welcome');
})->name('beranda');

Route::get('/karya', function () {
    return view('karya.index');
})->name('karya.index');

Route::get('/karya/create', function () {
    return view('karya.create');
})->name('karya.create');

Route::get('/karya/store', function () {
    return view('karya.store');
})->name('karya.store');
