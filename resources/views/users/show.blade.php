@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- Card Profil --}}
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">

        <div class="card-header text-white" 
             style="background: #0a33bb; border-radius: 12px 12px 0 0;">
            <h5 class="mb-0">Profil {{ $user->name }}</h5>
        </div>

        <div class="card-body d-flex align-items-center" style="background: #fff;">

            {{-- Foto Profil --}}
            <img src="{{ $user->profile_photo 
                    ? asset('storage/' . $user->profile_photo)
                    :  asset('images/se.png') }}"
                class="rounded-circle shadow-sm"
                width="120" height="120">

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
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        
        <div class="card-header bg-white" style="border-radius: 12px 12px 0 0;">
            <h5 class="mb-0 fw-bold">Portofolio</h5>
        </div>

        <div class="card-body" style="background: #FAFBFC; border-radius: 0 0 12px 12px;">

            @forelse($user->portfolios as $portfolio)
                <div class="p-3 bg-white rounded shadow-sm mb-3">

                    <h5 class="fw-bold mb-1">{{ $portfolio->title }}</h5>
                    <p class="text-secondary">{{ $portfolio->description }}</p>

                    @if($portfolio->image)
                        <img src="{{ asset('storage/' . $portfolio->image) }}"
                            class="img-fluid rounded mb-3" width="260">
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

</div>
@endsection
