@extends('layouts.app')
@section('content')

<style>
    /* === Custom Admin Table Style === */
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
        letter-spacing: 0.5px;
        border-radius: 12px 12px 0 0;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
        background-color: white;
    }

    .table thead {
        background-color: #0d6efd;
        color: white;
        text-align: center;
    }

    .table tbody tr:hover {
        background-color: #f1f4ff;
        transition: 0.2s;
    }

    .btn-action {
        padding: 5px 8px;
        border-radius: 6px;
        font-size: 0.85rem;
        transition: 0.2s;
    }

    .btn-action:hover {
        transform: scale(1.08);
    }

    .modal-content {
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.15);
    }

    .nav-tabs {
        background-color: white;
        border-radius: 10px;
        padding: 5px;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #333;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        background-color: #0d6efd;
        color: white;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

    .table th {
        font-size: 0.95rem;
    }
</style>

<div class="container-fluid py-4">

    <h1 class="mb-4 fw-bold text-primary">
        <i class="bi bi-newspaper me-2"></i> Berita Software Engineering UPITRA
    </h1>

    {{-- Tombol Tambah Berita --}}
    <div class="text-end mb-3">
         <button id="btnTambahBerita" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAcara">
            <i class="bi bi-plus-lg"></i> Tambah Berita
        </button>
    </div>

    {{-- Tab Navigasi --}}
    <ul class="nav nav-tabs mb-4" id="beritaTab" role="tablist">
        <li class="nav-item"><button class="nav-link active" id="acara-tab" data-bs-toggle="tab" data-bs-target="#berita" type="button">Berita</button></li>
        <li class="nav-item"><button class="nav-link" id="visi-tab" data-bs-toggle="tab" data-bs-target="#visi" type="button">Visi & Misi</button></li>
        <li class="nav-item"><button class="nav-link" id="akreditasi-tab" data-bs-toggle="tab" data-bs-target="#akreditasi" type="button">Akreditasi</button></li>
        <li class="nav-item"><button class="nav-link" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button">Tujuan Prodi</button></li>
        <li class="nav-item"><button class="nav-link" id="keahlian-tab" data-bs-toggle="tab" data-bs-target="#keahlian" type="button">Keahlian</button></li>
    </ul>

    <div class="tab-content" id="beritaTabContent">

        {{-- TAB BERITA --}}
        <div class="tab-pane fade show active" id="berita" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-calendar-event me-2"></i> Daftar Berita
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Judul</th>
                                    <th width="15%">Tanggal</th>
                                    <th width="15%">Penulis</th>
                                    <th>Deskripsi</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acaras as $acara)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $acara->judul }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</td>
                                    <td>{{ $acara->penulis }}</td>
                                    <td>{{ Str::limit($acara->deskripsi, 80) }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#modalEditAcara{{ $acara->id }}" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form action="{{ route('acara.destroy', $acara->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm btn-action" title="Hapus" onclick="return confirm('Hapus acara ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @if($acaras->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        <i class="bi bi-exclamation-circle me-1"></i> Belum ada data acara.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB LAIN --}}
        <div class="tab-pane fade" id="visi" role="tabpanel">
            <div class="card">
                <div class="card-header"><i class="bi bi-lightbulb me-2"></i> Visi & Misi</div>
                <div class="card-body">
                    <p><strong>Visi:</strong> Menjadi program studi unggul di bidang Rekayasa Perangkat Lunak.</p>
                    <ul>
                        <li>Menyelenggarakan pendidikan efektif dan efisien.</li>
                        <li>Menghasilkan lulusan profesional, kreatif, dan berintegritas.</li>
                        <li>Berperan aktif dalam penelitian inovatif bidang TI.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="akreditasi" role="tabpanel">
            <div class="card">
                <div class="card-header"><i class="bi bi-award me-2"></i> Akreditasi</div>
                <div class="card-body">
                    <div class="alert alert-light border-start border-primary border-4">
                        Program Studi Software Engineering UPITRA telah terakreditasi dengan peringkat <strong>Baik Sekali</strong>.
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="profil" role="tabpanel">
            <div class="card">
                <div class="card-header"><i class="bi bi-bullseye me-2"></i> Tujuan Program Studi</div>
                <div class="card-body">
                    <ul>
                        <li>Menghasilkan lulusan kompeten dan berintegritas.</li>
                        <li>Berinovasi di bidang rekayasa perangkat lunak.</li>
                        <li>Mengabdi kepada masyarakat melalui teknologi.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="keahlian" role="tabpanel">
            <div class="card">
                <div class="card-header"><i class="bi bi-tools me-2"></i> Keahlian Software Engineering</div>
                <div class="card-body">
                    <ul>
                        <li>Pengembangan aplikasi web & mobile</li>
                        <li>Analisis sistem & database</li>
                        <li>Manajemen proyek perangkat lunak</li>
                        <li>Keamanan data</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>

{{-- Modal Tambah Acara --}}
<div class="modal fade" id="modalTambahAcara" tabindex="-1" aria-labelledby="modalTambahAcaraLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Acara</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Acara</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const btnTambahBerita = document.getElementById('btnTambahBerita');
    const tabEl = document.getElementById('beritaTab');

    // Jalankan setiap kali tab berubah
    tabEl.addEventListener('shown.bs.tab', function (event) {
        const target = event.target.getAttribute('data-bs-target'); // ID tab aktif
        if (target === '#berita') {
            btnTambahBerita.style.display = 'inline-block'; // Tampilkan tombol
        } else {
            btnTambahBerita.style.display = 'none'; // Sembunyikan tombol
        }
    });
});
</script>

@endsection
