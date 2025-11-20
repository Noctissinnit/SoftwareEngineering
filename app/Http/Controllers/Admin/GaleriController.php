<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'image'       => 'required|image|max:2048',
            'description' => 'nullable'
        ]);

        $image = $request->file('image')->store('galeri', 'public');

        Galeri::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable'
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri dihapus');
    }
}
