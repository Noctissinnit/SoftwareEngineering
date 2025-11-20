<?php
namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePortfolioController extends Controller
{
    public function create()
    {
        return view('profile.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable|mimes:pdf,jpg,png,jpeg'
        ]);

        $filePath = $request->file ? $request->file->store('portfolios') : null;

        Portfolio::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
        ]);

        return redirect()->route('profile.show')->with('success', 'Portfolio berhasil ditambahkan');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::where('user_id', Auth::id())->findOrFail($id);
        return view('profile.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable|mimes:pdf,jpg,png,jpeg'
        ]);

        $filePath = $portfolio->file;

        if ($request->file) {
            $filePath = $request->file->store('portfolios');
        }

        $portfolio->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
        ]);

        return redirect()->route('profile.show')->with('success', 'Portfolio berhasil diupdate');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::where('user_id', Auth::id())->findOrFail($id);
        $portfolio->delete();

        return back()->with('success', 'Portfolio dihapus');
    }
}
