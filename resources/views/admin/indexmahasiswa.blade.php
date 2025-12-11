@extends('layouts.app')

@section('content')

<div class="container-fluid admin-page">

    @include('admin._header', [
        'title' => '<i class="bi bi-people-fill me-2"></i>Mahasiswa dan Mahasiswi',
        'subtitle' => 'Kelola data mahasiswa dan import dari Excel'
    ])

    {{-- Form Tambah & Import --}}
    <div class="card mb-4 admin-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-person-plus me-2"></i>Tambah Mahasiswa</span>
            <form action="{{ route('admin.mahasiswa.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                @csrf
                <input type="file" name="file" class="form-control form-control-sm me-2" accept=".xlsx,.xls,.csv" required>
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="bi bi-file-earmark-excel"></i> Import Excel
                </button>
            </form>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="card admin-card">
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
