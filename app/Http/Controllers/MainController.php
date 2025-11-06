<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Berita;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {
        $mahasiswaCount = User::whereHas('roles', fn($q) => $q->where('name', 'mahasiswa'))->count();
        $dosenCount = User::whereHas('roles', fn($q) => $q->where('name', 'dosen'))->count();

        $beritaTerbaru = Berita::latest()->take(5)->get();
        $acaraTerbaru = Acara::latest()->take(5)->get();

        return view('main.dashboard', compact('mahasiswaCount', 'dosenCount', 'beritaTerbaru', 'acaraTerbaru'));
    }

    public function berita() {
        return view('main.indexberita');
    }

    public function dokumen() {
        return view('main.indexdokumen');
    }

    public function mahasiswa() {
        $mahasiswas = User::role('mahasiswa')->get()->groupBy('angkatan');
        return view('main.indexmahasiswa', compact('mahasiswas'));
    }

    public function pmb() {
        return view('main.indexpmb');
    }

    public function profildosen() {
        return view('main.indexprofildosen');
    }
}
