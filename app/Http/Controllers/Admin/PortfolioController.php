<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        // Admin melihat semua portofolio
        $portfolios = Portfolio::with('user')->latest()->get();

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        // Admin bisa memilih user mana yang ingin diberi portofolio
        $users = User::all();

        return view('admin.portfolio.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'pdf'         => 'nullable|mimes:pdf|max:5048',
            'image'       => 'nullable|image|max:2048',
            'link'        => 'nullable|string|max:255',
            'github'      => 'nullable|string|max:255',
        ]);

        $pdfPath = $request->hasFile('pdf')
            ? $request->file('pdf')->store('portfolio_pdf', 'public')
            : null;

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('portfolio_images', 'public')
            : null;

        Portfolio::create([
            'user_id'     => $request->user_id,
            'title'       => $request->title,
            'description' => $request->description,
            'pdf'         => $pdfPath,
            'image'       => $imagePath,
            'link'        => $request->link,
            'github'      => $request->github,
        ]);

        return redirect()->route('admin.portfolio.index')
                         ->with('success', 'Portofolio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $users = User::all();

        return view('admin.portfolio.edit', compact('portfolio', 'users'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'pdf'         => 'nullable|mimes:pdf|max:5048',
            'image'       => 'nullable|image|max:2048',
            'link'        => 'nullable|string|max:255',
            'github'      => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('pdf')) {
            if ($portfolio->pdf) Storage::disk('public')->delete($portfolio->pdf);
            $portfolio->pdf = $request->file('pdf')->store('portfolio_pdf', 'public');
        }

        if ($request->hasFile('image')) {
            if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
            $portfolio->image = $request->file('image')->store('portfolio_images', 'public');
        }

        $portfolio->update([
            'user_id'     => $request->user_id,
            'title'       => $request->title,
            'description' => $request->description,
            'link'        => $request->link,
            'github'      => $request->github,
        ]);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portofolio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->pdf) Storage::disk('public')->delete($portfolio->pdf);
        if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portofolio berhasil dihapus!');
    }
}
