@extends('layouts.main')

@section('content')

<style>
    /* Header Section */
    .page-title-section {
        background: linear-gradient(135deg, #03378c 0%, #0056d2 100%);
        padding: 80px 0;
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        color: white;
        text-align: center;
    }

    .page-title-section h1 {
        font-weight: 700;
        font-size: 2.8rem;
        animation: fadeInDown 1s ease;
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Kaprodi Card */
    .kaprodi-card {
        background: #ffffff;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.1);
        transition: .3s ease;
        text-align: center;
    }

    .kaprodi-card:hover {
        transform: translateY(-6px);
    }

    .kaprodi-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #03378c;
    }

    /* Dosen Cards */
    .dosen-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px 15px;
        text-align: center;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        transition: .3s ease;
    }

    .dosen-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .dosen-photo {
        width: 95px;
        height: 95px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .badge-role {
        background: #03378c;
        padding: 3px 10px;
        color: #fff;
        border-radius: 6px;
        font-size: 0.8rem;
    }
</style>

{{-- Header --}}
<section class="page-title-section">
    <div class="container">
        <h1>Profil Dosen</h1>
        <p class="mt-2" style="opacity: .9;">Program Studi Software Engineering</p>
    </div>
</section>

{{-- Content --}}
<section class="py-5">
    <div class="container">

        {{-- Kaprodi --}}
        @php
            $kaprodi = $dosens->firstWhere('role', 'kaprodi');
            $dosenBiasa = $dosens->where('role', '!=', 'kaprodi');
        @endphp

        @if($kaprodi)
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7">
                <div class="kaprodi-card">
                    <img class="kaprodi-photo" 
                         src="{{ asset('storage/' . $kaprodi->photo) }}" 
                         alt="{{ $kaprodi->name }}">
                    <h3 class="fw-bold text-primary mt-3">{{ $kaprodi->name }}</h3>
                    <span class="badge bg-success px-3 py-2 mt-2" style="font-size: 1rem;">Kaprodi</span>
                </div>
            </div>
        </div>
        @endif

        {{-- Dosen Lain --}}
        <div class="row g-4">
            @forelse($dosenBiasa as $dosen)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="dosen-card h-100">
                    <img class="dosen-photo" 
                         src="{{ asset('storage/' . $dosen->photo) }}" 
                         alt="{{ $dosen->name }}">
                    <h6 class="fw-bold">{{ $dosen->name }}</h6>
                    <span class="badge-role">{{ ucfirst($dosen->role) }}</span>
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <h5 class="text-muted">Belum ada data dosen.</h5>
            </div>
            @endforelse
        </div>

    </div>
</section>

@endsection
