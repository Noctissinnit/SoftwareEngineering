<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/berita', function () {
        return view('admin.indexberita');
    });

    Route::get('/dokumen', function () {
        return view('admin.indexdokumen');
    });

    Route::get('/mahasiswa', function () {
        return view('admin.indexmahasiswa');
    });

    Route::get('/profildosen', function () {
        return view('admin.indexprofildosen');
    });
});
