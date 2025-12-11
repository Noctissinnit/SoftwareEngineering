@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

    <x-admin-header :title="'Profil ' . $user->name" :subtitle="'Lihat informasi pengguna dan portofolionya'" />

    {{-- Card Profil --}}
    <div class="admin-card mb-4">

        <div class="d-flex align-items-center">

            {{-- Foto Profil --}}
            <img src="{{ $user->profile_photo 
                    ? asset('storage/' . $user->profile_photo)
                    :  asset('images/se.png') }}"
                class="rounded-circle shadow-sm"
                width="120" height="120"
                style="object-fit: cover;">

            {{-- Detail --}}
            <div class="ms-4">
                <h4 class="fw-bold">{{ $user->name }}</h4>

                <div class="text-secondary small mt-2">
                    <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="mb-1"><strong>Nomor Induk:</strong> {{ $user->nomor_induk ?? '-' }}</p>
                    <p class="mb-1"><strong>NIM:</strong> {{ $user->nim ?? '-' }}</p>
                    <p class="mb-1"><strong>Angkatan:</strong> {{ $user->angkatan ?? '-' }}</p>
                </div>
            </div>

        </div>
    </div>

    {{-- Card Portofolio --}}
    <div class="admin-card">
        
        <h5 class="fw-bold mb-4">Portofolio</h5>

        @forelse($user->portfolios as $portfolio)
            <div class="p-3 bg-light rounded shadow-sm mb-3">

                <h5 class="fw-bold mb-1">{{ $portfolio->title }}</h5>
                <p class="text-secondary">{{ $portfolio->description }}</p>

                @if($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}"
                        class="img-fluid rounded mb-3" width="260"
                        style="object-fit: cover;">
                @endif

                @if($portfolio->link)
                    <a href="{{ $portfolio->link }}" 
                       target="_blank" 
                       class="btn btn-primary btn-sm px-3">
                        Kunjungi Link
                    </a>
                @endif

            </div>
        @empty
            <p class="text-muted">Belum ada portofolio</p>
        @endforelse

    </div>

</div>
@endsection
