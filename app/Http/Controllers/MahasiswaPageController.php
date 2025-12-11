<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaPageController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $portfolioCount = $user ? $user->portfolios()->count() : 0;
        $recentPortfolios = $user ? $user->portfolios()->latest()->take(5)->get() : collect();
        $recentBerita = \App\Models\Berita::latest()->take(5)->get();
        $recentAcara = \App\Models\Acara::latest()->take(5)->get();

        return view('mahasiswa.dashboard', compact('portfolioCount', 'recentPortfolios', 'recentBerita', 'recentAcara'));
    }
}
