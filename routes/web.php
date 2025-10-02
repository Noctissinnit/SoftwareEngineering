<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\ProfilDosenController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'main.indexhome')->name('home');
Route::view('/berita', 'main.indexberita')->name('berita');
Route::view('/dokumen', 'main.indexdokumen')->name('dokumen');
Route::view('/mahasiswa', 'main.indexmahasiswa')->name('mahasiswa');
Route::view('/pmb', 'main.indexpmb')->name('pmb');
Route::view('/profildosen', 'main.indexprofildosen')->name('profildosen');


Route::prefix('admin')->group(function () {
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('admin.dokumen');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
    Route::get('/profildosen', [ProfilDosenController::class, 'index'])->name('admin.profildosen');
});
