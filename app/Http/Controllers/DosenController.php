<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('admin.indexprofildosen', compact('dosens'));
    }

    /**
     * Display a listing of the resource for main view.
     */
    public function indexMain()
    {
        $dosens = Dosen::all();
        return view('main.indexprofildosen', compact('dosens'));
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
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);
        $data = $request->only(['name', 'role']);
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('dosen', 'public');
        }
        Dosen::create($data);
        return redirect()->route('admin.profildosen')->with('success', 'Profil dosen berhasil ditambahkan');
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
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);
        $data = $request->only(['name', 'role']);
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('dosen', 'public');
        }
        $dosen->update($data);
        return redirect()->route('admin.profildosen')->with('success', 'Profil dosen berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        // hapus foto jika ada
        if ($dosen->photo && \Storage::disk('public')->exists($dosen->photo)) {
            \Storage::disk('public')->delete($dosen->photo);
        }
        $dosen->delete();
        return redirect()->route('admin.profildosen')->with('success', 'Profil dosen berhasil dihapus');
    }
}
