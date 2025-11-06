<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\MahasiswaImport;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = \App\Models\User::role('mahasiswa')
            ->whereNotNull('angkatan')
            ->get()
            ->groupBy('angkatan'); // grup otomatis berdasarkan angkatan
        return view('admin.indexmahasiswa', compact('mahasiswas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'semester' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);
        $data = $request->only(['nama', 'nim', 'semester']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }
        User::create($data);
        return back()->with('success', 'User berhasil ditambahkan');
    }

    public function destroy(User $mahasiswa)
    {
        if ($mahasiswa->foto && \Storage::disk('public')->exists($mahasiswa->foto)) {
            \Storage::disk('public')->delete($mahasiswa->foto);
        }
        $mahasiswa->delete();
        return back()->with('success', 'Mahasiswa berhasil dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new MahasiswaImport, $request->file('file'));

        return back()->with('success', 'Data mahasiswa berhasil diimpor!');
    }
}
