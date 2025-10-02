<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\ProfilDosenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('admin.dokumen');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
    Route::get('/profildosen', [ProfilDosenController::class, 'index'])->name('admin.profildosen');
});
