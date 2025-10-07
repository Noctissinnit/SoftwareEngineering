@extends('layouts.main')

@section('content')
<section class="profils-dosen py-5">
    <div class="container">
        <h1 class="mb-4 fw-bold" style="color: #03378c;">Daftar Profil Dosen</h1>
        
        {{-- Kaprodi --}}
        @php
            $kaprodi = $dosens->firstWhere('role', 'kaprodi');
            $dosenBiasa = $dosens->where('role', '!=', 'kaprodi');
        @endphp

        @if($kaprodi)
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg text-center py-4 px-3" style="background: #f8f9fa;">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('storage/' . $kaprodi->photo) }}" alt="{{ $kaprodi->name }}" class="rounded-circle mb-3" style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #03378c;">
                        <h3 class="card-title text-primary fw-bold mb-1">{{ $kaprodi->name }}</h3>
                        <span class="badge bg-success mb-2 px-3 py-2" style="font-size: 1rem;">Kaprodi</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- Dosen Biasa --}}
        <div class="row g-4">
            @forelse($dosenBiasa as $dosen)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 text-center py-3 px-2" style="background: #f8f9fa;">
                        <img src="{{ asset('storage/' . $dosen->photo) }}" alt="{{ $dosen->name }}" class="card-img-top rounded mx-auto mb-2" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="card-body p-0">
                            <h6 class="card-title fw-bold mb-1">{{ $dosen->name }}</h6>
                            <span class="badge bg-primary px-2 py-1">{{ ucfirst($dosen->role) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada data dosen.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
