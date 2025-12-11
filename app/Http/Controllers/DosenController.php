<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Dosen;
use App\Models\User;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();
        $mahasiswaCount = \App\Models\User::whereHas('roles', function($q){ $q->where('name','mahasiswa'); })->count();
        $portfolioCount = \App\Models\Portfolio::count();
        $recentPortfolios = \App\Models\Portfolio::latest()->take(6)->get();
        $recentBerita = \App\Models\Berita::latest()->take(5)->get();

        return view('dosen.dashboard', compact('user','mahasiswaCount','portfolioCount','recentPortfolios','recentBerita'));
    }

    public function indexAdmin()
    {
        $dosens = User::role('dosen')->get();
        return view('admin.indexprofildosen', compact('dosens'));
    }

    /**
     * Display a listing of the resource for main view.
     */
    public function indexMain()
    {
        $dosens = User::role('dosen')->get();
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
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|exists:roles,name',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Simpan foto jika ada
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('dosen', 'public');
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'), // password default
            'photo' => $photoPath,
        ]);

        // Berikan role menggunakan Spatie
        $user->assignRole($request->role);

        return redirect()
            ->route('admin.profildosen')
            ->with('success', 'Profil dosen berhasil ditambahkan.');
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
   public function update(Request $request, User $dosen)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $dosen->id,
            'role' => 'required|string|exists:roles,name',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Simpan foto baru jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($dosen->photo && Storage::disk('public')->exists($dosen->photo)) {
                Storage::disk('public')->delete($dosen->photo);
            }

            $photoPath = $request->file('photo')->store('dosen', 'public');
            $dosen->photo = $photoPath;
        }

        // Update nama & email
        $dosen->name = $request->name;
        if ($request->filled('email')) {
            $dosen->email = $request->email;
        }
        $dosen->save();

        // Update role menggunakan Spatie
        $dosen->syncRoles([$request->role]);

        return redirect()
            ->route('admin.profildosen')
            ->with('success', 'Profil dosen berhasil diupdate.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $dosen)
    {
        // hapus foto jika ada
        if ($dosen->photo && Storage::disk('public')->exists($dosen->photo)) {
            Storage::disk('public')->delete($dosen->photo);
        }
        $dosen->delete();
        return redirect()->route('admin.profildosen')->with('success', 'Profil dosen berhasil dihapus');
    }
}
