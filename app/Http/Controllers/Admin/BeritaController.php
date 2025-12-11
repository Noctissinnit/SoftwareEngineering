<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ✅ Pastikan baris ini ada
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // ✅ Tambahkan ini karena kamu pakai Storage

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin|dosen'])->except(['index', 'show']);
    }

    // Semua user bisa lihat daftar berita
    public function index()
    {
        $beritas = Berita::latest()->paginate(6);
        return view('main.berita.indexberita', compact('beritas'));
    }

    // Detail berita
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    // Halaman admin kelola berita
    public function adminIndex()
    {
        $beritas = Berita::where('user_id', Auth::id())->latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }
}
