<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramContent;
use Illuminate\Http\Request;

class ProgramContentController extends Controller
{
    public function index()
    {
        $contents = [
            'visi_misi' => ProgramContent::where('key', 'visi_misi')->first(),
            'tujuan' => ProgramContent::where('key', 'tujuan')->first(),
            'akreditasi' => ProgramContent::where('key', 'akreditasi')->first(),
        ];

        return view('admin.program-content.index', compact('contents'));
    }

    public function edit($key)
    {
        $content = ProgramContent::where('key', $key)->first();
        
        if (!$content) {
            $content = new ProgramContent(['key' => $key, 'title' => '', 'content' => '']);
        }

        $titles = [
            'visi_misi' => 'Visi & Misi',
            'tujuan' => 'Tujuan Program Studi',
            'akreditasi' => 'Akreditasi',
        ];

        return view('admin.program-content.edit', [
            'content' => $content,
            'key' => $key,
            'title' => $titles[$key] ?? ucfirst(str_replace('_', ' ', $key))
        ]);
    }

    public function update(Request $request, $key)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $content = ProgramContent::where('key', $key)->first();

        if ($content) {
            $content->update($validated);
        } else {
            ProgramContent::create(array_merge(['key' => $key], $validated));
        }

        return redirect()->route('admin.program-content.index')
                        ->with('success', 'Konten berhasil disimpan!');
    }
}
