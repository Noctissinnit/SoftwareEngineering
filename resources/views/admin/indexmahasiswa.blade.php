@extends('layouts.app')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/adminmahasiswa.css') }}">
@endpush

<div class="container my-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Kemahasiswaan</h1>
        <p class="text-muted">Program Studi Software Engineering - Universitas Pignatelli Triputra</p>
    </div>

    {{-- Profil Lulusan --}}
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header bg-primary text-white fw-bold">
            Profil Lulusan
        </div>
        <div class="card-body text-center">
            <h3 class="text-muted fst-italic">Coming Soon...</h3>
        </div>
    </div>

    {{-- Daftar Mahasiswa --}}
    <div class="row g-4">
        @foreach ([1,3,5,7] as $semester)
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white fw-bold">
                        Semester {{ $semester }}
                    </div>
                    <div class="card-body text-center">
                        <p class="text-muted">Data mahasiswa belum tersedia.</p>
                        <ul class="list-group list-group-flush">
                            {{-- nanti admin tambahkan daftar mahasiswa --}}
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
