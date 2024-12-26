<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;





Route::get('/', [TeacherController::class, 'index'])->name('index');

Route::get('/alldata', [TeacherController::class, 'create'])->name('alldata');
Route::post('/data/store', [TeacherController::class, 'store'])->name('store');
Route::get('/data/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
Route::post('/data/update/{id}', [TeacherController::class, 'update'])->name('update');
Route::get('/data/delete/{id}', [TeacherController::class, 'delete'])->name('delete');
Route::get('/data/status/{id}', [TeacherController::class, 'status'])->name('status');
