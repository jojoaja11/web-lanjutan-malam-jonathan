<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\DosenKRSController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Admin-only resources
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('/mahasiswa', MahasiswaController::class);
        Route::resource('/dosen', DosenController::class);
        Route::resource('/jurusan', JurusanController::class);
        Route::resource('/mata_kuliah', MatakuliahController::class);
        Route::resource('/kelas', KelasController::class)->except(['show', 'edit', 'update']);
    });

    // Mahasiswa-only: KRS (index, create, store, show)
    Route::prefix('mahasiswa')->middleware(['role:mahasiswa'])->group(function () {
        Route::get('krs', [KRSController::class, 'index'])->name('mahasiswa.krs.index');
        Route::get('krs/create', [KRSController::class, 'create'])->name('mahasiswa.krs.create');
        Route::post('krs', [KRSController::class, 'store'])->name('mahasiswa.krs.store');
        Route::get('krs/{krs}', [KRSController::class, 'show'])->name('mahasiswa.krs.show');
    });

    // Dosen: read-only view + approve/reject
    Route::prefix('dosen')->middleware(['role:dosen'])->group(function () {
        Route::get('krs', [DosenKRSController::class, 'index'])->name('dosen.krs.index');
        Route::get('krs/{krs}', [DosenKRSController::class, 'show'])->name('dosen.krs.show');
        Route::post('krs/{krs}/approve', [DosenKRSController::class, 'approve'])->name('dosen.krs.approve');
        Route::post('krs/{krs}/reject', [DosenKRSController::class, 'reject'])->name('dosen.krs.reject');
        Route::post('krs/{krs}/detail/{detail}/approve', [DosenKRSController::class, 'approveDetail'])->name('dosen.krs.detail.approve');
        Route::post('krs/{krs}/detail/{detail}/reject', [DosenKRSController::class, 'rejectDetail'])->name('dosen.krs.detail.reject');
    });

    // Allow Admin to view all KRS (optional)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('krs', [KRSController::class, 'adminIndex'])->name('admin.krs.index');
        Route::get('krs/{krs}/admin', [KRSController::class, 'adminShow'])->name('admin.krs.show');
    });

    // logout route inside auth group (duplicate removed if exists)
});
