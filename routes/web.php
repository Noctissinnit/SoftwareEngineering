<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DokumenController;

use App\Http\Controllers\Admin\ProfilDosenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\MahasiswaPageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RpsController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MainController::class, 'home'])->name('home');
//Route Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
//Route Acara
Route::get('/acara', [AcaraController::class, 'indexMain'])->name('acara');
Route::get('/berita/acara/{id}', [AcaraController::class, 'showDetail'])->name('acara.detail');

Route::view('/dokumen', 'main.indexdokumen')->name('dokumen');
Route::get('/mahasiswa', [MainController::class, 'mahasiswa'])->name('mahasiswa');
Route::view('/pmb', 'main.indexpmb')->name('pmb');
Route::get('/profildosen', [DosenController::class, 'indexMain'])->name('profildosen');
Route::view('/sejarah-prodi', 'main.sejarah-prodi')->name('sejarah-prodi');
Route::view('/visi-misi', 'main.visi-misi')->name('visi-misi');

//Route RPS
Route::get('/rps-index', [RpsController::class, 'index'])->name('rps-index');

// Form input nomor induk & submit
Route::get('/rps', [RpsController::class, 'checkForm'])->name('rps.check-form');
Route::post('/rps/verify', [RpsController::class, 'verifyNomorInduk'])->name('rps.verify-nomor');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

   Route::middleware(['auth', 'role:admin|dosen'])->group(function () {
        Route::get('/adminacara', [AcaraController::class, 'index'])->name('admin.acara');
    });

    
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    //Route CRUD BERITA
    Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
    // Route::get('/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    Route::get('/dokumen', [DokumenController::class, 'index'])->name('admin.dokumen');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('rps.store');
    Route::delete('/dokumen/{rps}', [DokumenController::class, 'destroy'])->name('rps.destroy');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    Route::get('/profildosen', [DosenController::class, 'indexAdmin'])->name('admin.profildosen');
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import');

    //Route CRUD ACARA
    Route::resource('acara', AcaraController::class);
    //Route CRUD DOSEN
    Route::resource('dosen', DosenController::class);
});

Route::middleware(['auth','role:dosen'])->prefix('dosen')->group(function () {
    Route::get('/dashboard', [DosenController::class, 'index'])->name('dosen.dashboard');
    
    Route::resource('acara', AcaraController::class);

});

Route::middleware(['auth','role:mahasiswa'])->prefix('mahasiswa')->group(function () {
   Route::get('/dashboard', [MahasiswaPageController::class, 'index'])->name('mahasiswa.dashboard');
});
