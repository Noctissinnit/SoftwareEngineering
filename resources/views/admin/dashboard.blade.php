@extends('layouts.app')

@section('content')

<div class="container-fluid admin-page">

    {{-- Header --}}
    <div class="admin-header">
        <h1><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h1>
        <p>Selamat datang di dashboard admin. Kelola data Kaprodi, Dosen, Berita, Acara, dan dokumen disini.</p>
    </div>

    {{-- Statistik Ringkas --}}
    <div class="row g-4 mb-4 admin-stats">
        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3 admin-card">
                <div class="icon-box mx-auto">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-label">Total Dosen</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3 admin-card">
                <div class="icon-box mx-auto">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div class="stat-label">Total Kaprodi</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3 admin-card">
                <div class="icon-box mx-auto">
                    <i class="bi bi-book"></i>
                </div>
                <div class="stat-label">Mata Kuliah</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-3 admin-card">
                <div class="icon-box mx-auto">
                    <i class="bi bi-gear"></i>
                </div>
                <div class="stat-label">User Terdaftar</div>
            </div>
        </div>
    </div>

    {{-- Card Utama --}}
    <div class="card admin-card">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-info-circle me-2"></i>Informasi</h5>
            <p class="card-text">
                Gunakan sidebar di sebelah kiri untuk mengelola berbagai fitur sistem seperti profil Kaprodi, Dosen, dan data akademik lainnya.  
                <br><br>
                <strong>Tips:</strong> Klik ikon menu di sidebar untuk berpindah antar halaman dengan cepat.
            </p>
        </div>
    </div>

</div>

@endsection
