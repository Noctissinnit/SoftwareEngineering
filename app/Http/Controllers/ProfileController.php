<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Portfolio;

class ProfileController extends Controller
{
    /**
     * Halaman profil saya
     */
    public function index()
    {
        $user = Auth::user();
        $portfolios = Portfolio::where('user_id', $user->id)->get();

        return view('profile.index', compact('user', 'portfolios'));
    }

    /**
     * Update profil: nama, foto
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Upload Portfolio (PDF, link, GitHub, dsb)
     */
    public function uploadPortfolio(Request $request)
    {
        $request->validate([
            'type' => 'required|in:pdf,link,github',
            'title' => 'required|string|max:255',
            'portfolio_file' => 'nullable|mimes:pdf|max:4096',
            'portfolio_link' => 'nullable|string',
        ]);

        $portfolio = new Portfolio();
        $portfolio->user_id = Auth::id();
        $portfolio->type = $request->type;
        $portfolio->title = $request->title;

        if ($request->type == 'pdf') {
            $path = $request->file('portfolio_file')->store('portfolios', 'public');
            $portfolio->file_path = $path;
        } else {
            // link atau github
            $portfolio->url = $request->portfolio_link;
        }

        $portfolio->save();

        return back()->with('success', 'Portfolio berhasil ditambahkan!');
    }

    /**
     * Hapus Portfolio
     */
    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($portfolio->file_path) {
            \Storage::disk('public')->delete($portfolio->file_path);
        }

        $portfolio->delete();

        return back()->with('success', 'Portfolio berhasil dihapus!');
    }

    /**
     * Daftar mahasiswa satu kelas
     */
    public function classmates()
    {
        $user = Auth::user();

        // Asumsi: user memiliki kolom class_id
        $classmates = User::where('class_id', $user->class_id)
            ->where('id', '!=', $user->id)
            ->get();

        return view('profile.classmates', compact('classmates'));
    }

    /**
     * Lihat profil mahasiswa lain
     */
    public function show()
        {
            $user = Auth::user();
            $portfolios = $user->portfolios()->latest()->get();

            return view('profile.show', compact('user', 'portfolios'));
        }
}
