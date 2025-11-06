@extends('layouts.main')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/adminmahasiswa.css') }}">
@endpush

<div class="container my-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Mahasiswa dan Mahasiswi</h1>
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

    {{-- Daftar Mahasiswa Berdasarkan Angkatan --}}
    <div class="row g-4">
        @forelse ($mahasiswas as $angkatan => $listMahasiswa)
            <div class="col-12">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-primary text-white fw-bold text-center fs-5">
                        Angkatan {{ $angkatan ?? 'Tidak Diketahui' }}
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            @foreach ($listMahasiswa as $mhs)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="d-flex align-items-center p-2 border rounded shadow-sm bg-light">
                                        @if($mhs->foto)
                                            <img src="{{ asset('storage/' . $mhs->foto) }}" 
                                                 alt="{{ $mhs->name }}" 
                                                 class="rounded-circle me-3" 
                                                 style="width:50px;height:50px;object-fit:cover;">
                                        @else
                                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                                 style="width:50px;height:50px;">
                                                <span>{{ strtoupper(substr($mhs->name, 0, 1)) }}</span>
                                            </div>
                                        @endif
                                        <div>
                                            <strong>{{ $mhs->name }}</strong><br>
                                            <small class="text-muted">NIM: {{ $mhs->nim ?? '-' }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada data mahasiswa.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
