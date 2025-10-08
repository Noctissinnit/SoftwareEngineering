<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\ProfilDosenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'main.dashboard')->name('home');
//Route Berita
Route::get('/berita', [AcaraController::class, 'indexMain'])->name('berita');
Route::get('/berita/acara/{id}', [AcaraController::class, 'showDetail'])->name('berita.detail');
Route::view('/dokumen', 'main.indexdokumen')->name('dokumen');
Route::view('/mahasiswa', 'main.indexmahasiswa')->name('mahasiswa');
Route::view('/pmb', 'main.indexpmb')->name('pmb');
Route::get('/profildosen', [DosenController::class, 'indexMain'])->name('profildosen');
Route::view('/sejarah-prodi', 'main.sejarah-prodi')->name('sejarah-prodi');
Route::view('/visi-misi', 'main.visi-misi')->name('visi-misi');
Route::view('/rps-index', 'main.rps-index')->name('rps-index');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/berita', [AcaraController::class, 'index'])->name('admin.berita');
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('admin.dokumen');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
    Route::get('/profildosen', [DosenController::class, 'index'])->name('admin.profildosen');

    Route::resource('acara', AcaraController::class);
    Route::resource('dosen', DosenController::class);
});

