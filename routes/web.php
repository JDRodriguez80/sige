<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para la configuracion de la escuela
Route::get('/admin/school', [App\Http\Controllers\SchoolController::class, 'index'])->name('school.index')->middleware('auth');
Route::get('/admin/school/create', [App\Http\Controllers\SchoolController::class, 'create'])->name('school.create')->middleware('auth');
Route::post('/admin/school/store', [App\Http\Controllers\SchoolController::class, 'store'])->name('school.store')->middleware('auth');
Route::get('/admin/school/edit/{id}', [App\Http\Controllers\SchoolController::class, 'edit'])->name('school.edit')->middleware('auth');
Route::put('/admin/school/{id}', [App\Http\Controllers\SchoolController::class, 'update'])->name('school.update')->middleware('auth');
Route::delete('/admin/school/{id}', [App\Http\Controllers\SchoolController::class, 'destroy'])->name('school.destroy')->middleware('auth');
//secciones
Route::get('/admin/section', [App\Http\Controllers\SectionController::class, 'index'])->name('section.index')->middleware('auth');
Route::get('/admin/section/create', [App\Http\Controllers\SectionController::class, 'create'])->name('section.create')->middleware('auth');
Route::post('/admin/section/store', [App\Http\Controllers\SectionController::class, 'store'])->name('section.store')->middleware('auth');
Route::get('/admin/section/edit/{id}', [App\Http\Controllers\SectionController::class, 'edit'])->name('section.edit')->middleware('auth');
