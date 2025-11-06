@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .card-header {
        background-color: #0d6efd;
        color: white;
        font-weight: 600;
        border-radius: 12px 12px 0 0;
    }

    .nav-tabs {
        border: none;
        background-color: #fff;
        padding: 8px;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0,0,0,0.05);
        justify-content: flex-start;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #555;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .nav-tabs .nav-link.active {
        background-color: #0d6efd;
        color: white;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    .table {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        background-color: #0d6efd;
        color: white;
        text-align: center;
    }

    .table tbody tr:hover {
        background-color: #f1f5ff;
        transition: 0.2s;
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

    .btn-action {
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 0.85rem;
    }

    .foto-mahasiswa {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    .mahasiswa-header h1 {
        font-size: 2rem;
    }
</style>

<div class="container py-4 mahasiswa-container">

    {{-- Judul Halaman --}}
    <div class="mahasiswa-header mb-5">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i>Mahasiswa dan Mahasiswi
        </h1>
        <p class="text-muted mb-0">Program Studi Software Engineering - Universitas Pignatelli Triputra</p>
    </div>

    {{-- Form Tambah & Import --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-person-plus me-2"></i>Tambah Mahasiswa</span>
            <form action="{{ route('mahasiswa.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                @csrf
                <input type="file" name="file" class="form-control form-control-sm me-2" accept=".xlsx,.xls,.csv" required>
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="bi bi-file-earmark-excel"></i> Import Excel
                </button>
            </form>
        </div>

        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">NIM</label>
                        <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Angkatan</label>
                        <input type="number" name="angkatan" class="form-control" placeholder="2025" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-1 d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    {{-- Tabs Berdasarkan Angkatan --}}
    @if($mahasiswas->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-exclamation-circle"></i> Belum ada data mahasiswa.
        </div>
    @else
        <ul class="nav nav-tabs mb-4" role="tablist">
            @foreach ($mahasiswas->keys() as $angkatan)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                            data-bs-toggle="tab"
                            data-bs-target="#angkatan{{ $angkatan }}"
                            type="button" role="tab">
                        Angkatan {{ $angkatan }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach ($mahasiswas as $angkatan => $list)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="angkatan{{ $angkatan }}" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-list-check me-2"></i>Daftar Mahasiswa - Angkatan {{ $angkatan }}</span>
                            <span class="badge bg-light text-dark">{{ count($list) }} Mahasiswa</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Foto</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $mhs)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    @if($mhs->foto)
                                                        <img src="{{ asset('storage/' . $mhs->foto) }}" class="foto-mahasiswa" alt="{{ $mhs->nama }}">
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>{{ $mhs->nama }}</td>
                                                <td>{{ $mhs->nim }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger btn-action" onclick="return confirm('Yakin hapus mahasiswa ini?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
