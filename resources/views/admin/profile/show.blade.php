@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Profile Card --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>Profil Saya</h5>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>NIS/NIP:</strong> {{ $user->nis ?? '-' }}</p>
            <p><strong>Jabatan:</strong> {{ $user->userDetail->jabatan->nama ?? '-' }}</p>
            <p><strong>Divisi:</strong> {{ $user->userDetail->devisi->nama ?? '-' }}</p>
            <p><strong>Institusi:</strong> {{ $user->userDetail->institusi->nama ?? '-' }}</p>
        </div>
    </div>

    {{-- Portfolio List --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Portofolio Saya</h5>
            <a href="{{ route('profile.portfolio.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
        </div>

        <div class="card-body">
            @forelse($portfolios as $portfolio)
                <div class="border p-3 mb-3 rounded">
                    <h6>{{ $portfolio->judul }}</h6>
                    <p>{{ $portfolio->deskripsi }}</p>

                    @if($portfolio->file)
                        <a href="{{ asset('storage/'.$portfolio->file) }}" target="_blank">Lihat File</a>
                    @endif

                    <div class="mt-2">
                        <a href="{{ route('profile.portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('profile.portfolio.destroy', $portfolio->id) }}" 
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada portfolio.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection
