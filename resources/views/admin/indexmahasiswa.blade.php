@extends('layouts.app')

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

    {{-- Form Tambah Mahasiswa --}}
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
            <span>Tambah Mahasiswa</span>
            {{-- Form Import Excel --}}
            <form action="{{ route('mahasiswa.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                @csrf
                <input type="file" name="file" class="form-control form-control-sm me-2" accept=".xlsx,.xls,.csv" required>
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="bi bi-file-earmark-excel"></i> Import Excel
                </button>
            </form>
        </div>

        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="nim" class="form-control" placeholder="NIM" required>
                    </div>
                    <div class="col-md-2">
                        <select name="semester" class="form-control" required>
                            @foreach([1,3,5,7] as $semester)
                                <option value="{{ $semester }}">Semester {{ $semester }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary w-100">Tambah</button>
                    </div>
                </div>
            </form>

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
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
                        @if(isset($mahasiswas[$semester]) && count($mahasiswas[$semester]))
                            <ul class="list-group list-group-flush">
                                @foreach($mahasiswas[$semester] as $mhs)
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            @if($mhs->foto)
                                                <img src="{{ asset('storage/' . $mhs->foto) }}" alt="{{ $mhs->nama }}" class="rounded-circle me-2" style="width:40px;height:40px;object-fit:cover;">
                                            @endif
                                            <span>{{ $mhs->nama }} ({{ $mhs->nim }})</span>
                                        </div>
                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">Data mahasiswa belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
