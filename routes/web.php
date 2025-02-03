<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para la configuracion de la escuela
Route::get('/admin/school', [App\Http\Controllers\SchoolController::class, 'index'])->name('school.index')->middleware('auth');
