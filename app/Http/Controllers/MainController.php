<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {
        return view('main.dashboard');
    }

    public function berita() {
        return view('main.indexberita');
    }

    public function dokumen() {
        return view('main.indexdokumen');
    }

    public function mahasiswa() {
        $mahasiswas = Mahasiswa::all()->groupBy('semester');
        return view('main.indexmahasiswa', compact('mahasiswas'));
    }

    public function pmb() {
        return view('main.indexpmb');
    }

    public function profildosen() {
        return view('main.indexprofildosen');
    }
}
