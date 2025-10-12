<?php

namespace App\Http\Controllers;

use App\Models\Rps;
use Illuminate\Http\Request;

class RpsController extends Controller
{
    public function index()
    {
        $rps = Rps::all()->groupBy('semester');
        return view('admin.indexdokumen', compact('rps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'semester' => 'required|integer',
            'file_rps' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
      
        $data = $request->only(['nama_matkul', 'semester']);
        if ($request->hasFile('file_rps')) {
            $data['file_rps'] = $request->file('file_rps')->store('rps', 'public');
        }
        Rps::create($data);
        return back()->with('success', 'RPS berhasil ditambahkan');
    }

    public function destroy(Rps $rps)
    {
        if ($rps->file_rps && \Storage::disk('public')->exists($rps->file_rps)) {
            \Storage::disk('public')->delete($rps->file_rps);
        }
        $rps->delete();
        return back()->with('success', 'RPS berhasil dihapus');
    }
}
