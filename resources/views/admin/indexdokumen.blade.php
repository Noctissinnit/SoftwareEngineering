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
        justify-content: flex-start; /* 🔹 align tab ke kiri */
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

    .btn-action {
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 0.85rem;
    }

    .btn-action i {
        vertical-align: middle;
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-primary {
        border-radius: 8px;
    }

    /* 🔹 Tambahan untuk rata kiri semua konten */
    .rps-container {
        max-width: 100%;
        text-align: left;
    }

    .rps-header {
        text-align: left;
    }

    .rps-header h1 {
        font-size: 2rem;
    }

    .rps-header p {
        margin-left: 3px;
    }
</style>

<div class="container py-4 rps-container">

    {{-- Judul Halaman --}}
    <div class="rps-header mb-5">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-journal-bookmark me-2"></i>Daftar Mata Kuliah
        </h1>
        <p class="text-muted mb-0">Program Studi Software Engineering - Universitas Pignatelli Triputra</p>
    </div>

    {{-- Form Tambah RPS --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-plus-circle me-2"></i>Tambah Mata Kuliah
        </div>
        <div class="card-body">
            <form action="{{ route('rps.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_matkul" class="form-control" placeholder="Contoh: Pemrograman Web" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Semester</label>
                        <select name="semester" class="form-control" required>
                            @for($i=1;$i<=8;$i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">File RPS (PDF/DOC)</label>
                        <input type="file" name="file_rps" class="form-control" accept=".pdf,.doc,.docx">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tab Semester --}}
    <ul class="nav nav-tabs mb-4" id="semesterTab" role="tablist">
        @for ($i = 1; $i <= 8; $i++)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $i == 1 ? 'active' : '' }}" id="semester{{ $i }}-tab" data-bs-toggle="tab" data-bs-target="#semester{{ $i }}" type="button" role="tab" aria-controls="semester{{ $i }}" aria-selected="{{ $i == 1 ? 'true' : 'false' }}">
                    Semester {{ $i }}
                </button>
            </li>
        @endfor
    </ul>

    <div class="tab-content" id="semesterTabContent">

        @for ($i = 1; $i <= 8; $i++)
            <div class="tab-pane fade {{ $i == 1 ? 'show active' : '' }}" id="semester{{ $i }}" role="tabpanel" aria-labelledby="semester{{ $i }}-tab">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-list-check me-2"></i>Daftar Mata Kuliah - Semester {{ $i }}</span>
                        <span class="badge bg-light text-dark">{{ count($rps[$i] ?? []) }} Mata Kuliah</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th width="25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($rps[$i] ?? [] as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_matkul }}</td>
                                            <td class="text-center">
                                                @if($item->file_rps)
                                                    <a href="{{ asset('storage/' . $item->file_rps) }}" target="_blank" class="btn btn-sm btn-info btn-action me-1" title="Lihat File">
                                                        <i class="bi bi-eye"></i> Lihat
                                                    </a>
                                                @else
                                                    <span class="text-muted">Belum ada file</span>
                                                @endif
                                                <form action="{{ route('rps.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger btn-action" title="Hapus" onclick="return confirm('Yakin hapus RPS ini?')">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-3">
                                                <i class="bi bi-exclamation-circle me-1"></i> Belum ada data RPS untuk semester ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

</div>
@endsection
