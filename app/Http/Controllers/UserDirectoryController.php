<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDirectoryController extends Controller
{
    public function index()
    {
        // Ambil user yang punya portfolio, kecuali yang memiliki role 'admin', lalu paginasi
        $users = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'admin');
        })
          ->orderBy('name')
          ->paginate(12);

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // Include relation portfolio agar langsung dipakai
        $user = User::with('portfolios')->findOrFail($id);

        return view('users.show', compact('user'));
    }
}
