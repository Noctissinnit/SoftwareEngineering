@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #f4f6f9;
    }

    .dashboard-header {
        margin-bottom: 2rem;
    }

    .dashboard-header h1 {
        color: #0d6efd;
        font-weight: 700;
        font-size: 2rem;
    }

    .dashboard-header p {
        color: #6c757d;
        font-size: 1rem;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .card-title {
        color: #0d6efd;
        font-weight: 600;
    }

    .icon-box {
        width: 55px;
        height: 55px;
        border-radius: 10px;
        background-color: #e8f0ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 10px;
    }

    .stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0d6efd;
    }

    .stat-label {
        color: #6c757d;
        font-size: 0.95rem;
    }

    .content-wrapper {
        padding: 0 30px;
    }
</style>

<div class="container-fluid py-4 content-wrapper">

    {{-- Header --}}
    <div class="dashboard-header">
        <h1><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h1>
        <p>Selamat datang di dashboard admin. Kelola data dosen, kaprodi, dan fitur lainnya dari sini.</p>
    </div>

    {{-- Statistik Ringkas --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3">
                <div class="icon-box mx-auto">
                    <i class="bi bi-people"></i>
                </div>
                {{-- <div class="stat-number">{{ $totalDosen ?? 0 }}</div> --}}
                <div class="stat-label">Total Dosen</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3">
                <div class="icon-box mx-auto">
                    <i class="bi bi-person-badge"></i>
                </div>
                {{-- <div class="stat-number">{{ $totalKaprodi ?? 0 }}</div> --}}
                <div class="stat-label">Total Kaprodi</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3">
                <div class="icon-box mx-auto">
                    <i class="bi bi-book"></i>
                </div>
                {{-- <div class="stat-number">{{ $totalMatkul ?? 0 }}</div> --}}
                <div class="stat-label">Mata Kuliah</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3">
                <div class="icon-box mx-auto">
                    <i class="bi bi-gear"></i>
                </div>
                {{-- <div class="stat-number">{{ $totalUser ?? 0 }}</div> --}}
                <div class="stat-label">User Terdaftar</div>
            </div>
        </div>
    </div>

    {{-- Card Utama --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-info-circle me-2"></i>Informasi</h5>
            <p class="card-text">
                Gunakan sidebar di sebelah kiri untuk mengelola berbagai fitur sistem seperti profil dosen, kaprodi, dan data akademik lainnya.  
                <br><br>
                <strong>Tips:</strong> Klik ikon menu di sidebar untuk berpindah antar halaman dengan cepat.
            </p>
        </div>
    </div>

</div>

@endsection
