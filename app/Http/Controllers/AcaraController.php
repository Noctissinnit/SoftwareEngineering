<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acaras = Acara::all();
        return view('admin.indexberita', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'tanggal', 'penulis', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('acara', 'public');
        }

        Acara::create($data);
        return redirect()->route('admin.berita')->with('success', 'Acara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acara $acara)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'tanggal', 'penulis', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('acara', 'public');
        }

        $acara->update($data);
        return redirect()->route('admin.berita')->with('success', 'Acara berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acara $acara)
    {
        $acara->delete();
        return redirect()->route('admin.berita')->with('success', 'Acara berhasil dihapus');
    }

    /**
     * Display a listing of the resource for the main page.
     */
    public function indexMain()
    {
        $acaras = Acara::orderBy('tanggal', 'desc')->get();
        return view('main.indexberita', compact('acaras'));
    }

    /**
     * Display the detail of the specified resource.
     */
    public function showDetail($id)
    {
        $acara = Acara::findOrFail($id);
        return view('main.detailberita', compact('acara'));
    }
}
