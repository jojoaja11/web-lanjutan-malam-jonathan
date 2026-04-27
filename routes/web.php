<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/mahasiswa', DosenController::class);
Route::resource('/mahasiswa', JurusanController::class);
Route::resource('/mahasiswa', MatakuliahController::class);