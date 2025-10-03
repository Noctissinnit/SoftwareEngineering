@extends('layouts.app')
@section('content')

<head>
    ...
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
</head>


<div class="container my-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Profil Dosen</h1>
    </div>

    {{-- Kaprodi --}}
    <div class="card shadow kaprodi-card mb-5 mx-auto">
        <div class="card-body text-center">
            <img src="/images/kaprodi.png" class="img-fluid rounded-circle mb-3" width="160" alt="Kaprodi">
            <h4 class="fw-bold text-primary">Tutus Praningki S.Kom., M.Kom</h4>
            <p class="text-muted">Kepala Program Studi</p>
        </div>
    </div>

    {{-- Dosen Lainnya --}}
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card shadow dosen-card h-100 text-center">
                <div class="card-body">
                    <img src="/images/dosen1.png" class="img-fluid rounded-circle mb-3" width="140" alt="Dosen">
                    <h5 class="fw-bold">Wisnu Wedanto S.Kom., M.Kom</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow dosen-card h-100 text-center">
                <div class="card-body">
                    <img src="/images/dosen2.png" class="img-fluid rounded-circle mb-3" width="140" alt="Dosen">
                    <h5 class="fw-bold">Said Hirzi Hadi S.Kom., M.Eng</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow dosen-card h-100 text-center">
                <div class="card-body">
                    <img src="/images/dosen3.png" class="img-fluid rounded-circle mb-3" width="140" alt="Dosen">
                    <h5 class="fw-bold">Bagas Dwi Yulianto S.Kom., M.Kom</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow dosen-card h-100 text-center">
                <div class="card-body">
                    <img src="/images/dosen4.png" class="img-fluid rounded-circle mb-3" width="140" alt="Dosen">
                    <h5 class="fw-bold">Moyo Haddy P S.Kom., M.Kom</h5>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
