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

    {{-- Daftar Mahasiswa --}}
    <div class="row g-4">
        @foreach ([1,2,3,4,5,6,7,8] as $semester)
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white fw-bold text-center">
                        Semester {{ $semester }}
                    </div>
                    <div class="card-body text-center">
                        @if(isset($mahasiswas[$semester]) && count($mahasiswas[$semester]) > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($mahasiswas[$semester] as $mhs)
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            @if($mhs->foto)
                                                <img src="{{ asset('storage/' . $mhs->foto) }}" alt="{{ $mhs->nama }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                                            @else
                                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width:40px;height:40px;">
                                                    <span>{{ strtoupper(substr($mhs->nama, 0, 1)) }}</span>
                                                </div>
                                            @endif
                                            <div class="text-start">
                                                <strong>{{ $mhs->nama }}</strong><br>
                                                <small class="text-muted">{{ $mhs->nim }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted my-3">Data mahasiswa belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
