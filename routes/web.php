<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\ProgramContentController;

use App\Http\Controllers\Admin\ProfilDosenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\MahasiswaPageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RpsController;
use App\Http\Controllers\UserDirectoryController;
use App\Models\Galeri;
use Illuminate\Support\Facades\Route;



Route::get('/', [MainController::class, 'home'])->name('home');
//Route Berita
Route::get('/main/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
//Route Acara
Route::get('/acara', [MainController::class, 'indexMain'])->name('acara.index');
Route::get('/berita/acara/{id}', [MainController::class, 'showDetail'])->name('acara.detail');

Route::view('/dokumen', 'main.indexdokumen')->name('dokumen');
Route::get('/mahasiswa', [MainController::class, 'mahasiswa'])->name('mahasiswa');
Route::view('/pmb', 'main.indexpmb')->name('pmb');
Route::get('/profildosen', [DosenController::class, 'indexMain'])->name('profildosen');
Route::get('/sejarah-prodi', [MainController::class, 'tujuan'])->name('sejarah-prodi');
Route::get('/visi-misi', [MainController::class, 'visiMisi'])->name('visi-misi');
Route::get('/akreditasi', [MainController::class, 'akreditasi'])->name('akreditasi');


Route::get('/galeri', function () {
        $galeri = Galeri::latest()->get();
        return view('galeri.index', compact('galeri'));
    })->name('galeri');
//Route RPS
Route::get('/rps-index', [RpsController::class, 'index'])->name('rps-index');

// Form input nomor induk & submit
Route::get('/rps', [RpsController::class, 'checkForm'])->name('rps.check-form');
Route::post('/rps/verify', [RpsController::class, 'verifyNomorInduk'])->name('rps.verify-nomor');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

     
   Route::middleware(['role:admin|dosen'])->group(function () {
        Route::get('/adminacara', [AcaraController::class, 'index'])->name('admin.acara');
    });

     
    Route::prefix('admin')->group(function () {
        Route::resource('acara', AcaraController::class);
    });

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    // Update Profil Saya
    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Upload Portfolio
    Route::post('/profile/portfolio/upload', [ProfileController::class, 'uploadPortfolio'])
        ->name('profile.portfolio.upload');

    // Hapus Portfolio
    Route::delete('/profile/portfolio/{id}', [ProfileController::class, 'deletePortfolio'])
        ->name('profile.portfolio.delete');

    // Daftar Mahasiswa Satu Kelas
    Route::get('/kelas/mahasiswa', [ProfileController::class, 'classmates'])
        ->name('profile.classmates');

    // Lihat Profil Mahasiswa Lain
    Route::get('/profile/{id}', [ProfileController::class, 'show'])
        ->name('profile.show');

      // Daftar semua mahasiswa/dosen
    Route::get('/users', [UserDirectoryController::class, 'index'])
        ->name('users.index');

    // Detail profil
    Route::get('/users/{id}', [UserDirectoryController::class, 'show'])
        ->name('users.show');


    Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('berita.index');
    // Route::get('/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');


    //Route CRUD ACARA
    Route::resource('acara', AcaraController::class);
    
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    //Route CRUD BERITA
   

    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('rps.store');
    Route::delete('/dokumen/{rps}', [DokumenController::class, 'destroy'])->name('rps.destroy');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    Route::get('/profildosen', [DosenController::class, 'indexAdmin'])->name('profildosen');
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import');

    //CRUD Galeri
    Route::resource('galeri', GaleriController::class);

    //CRUD Portofolio
    Route::resource('portfolio', PortfolioController::class);

    //Program Content (Visi/Misi, Tujuan, Akreditasi)
    Route::get('/program-content', [ProgramContentController::class, 'index'])->name('program-content.index');
    Route::get('/program-content/{key}/edit', [ProgramContentController::class, 'edit'])->name('program-content.edit');
    Route::put('/program-content/{key}', [ProgramContentController::class, 'update'])->name('program-content.update');

    
    //Route CRUD DOSEN
    Route::resource('dosen', DosenController::class);
});

Route::middleware(['auth','role:dosen'])->prefix('dosen')->group(function () {
    Route::get('/dashboard', [DosenController::class, 'index'])->name('dosen.dashboard');
  

});

Route::middleware(['auth','role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
   Route::get('/dashboard', [MahasiswaPageController::class, 'index'])->name('dashboard');
});
