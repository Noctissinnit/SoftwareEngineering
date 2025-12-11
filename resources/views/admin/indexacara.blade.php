@extends('layouts.app')

@section('content')

<div class="container-fluid admin-page">

    {{-- Header --}}
    @include('admin._header', [
        'title' => '<i class="bi bi-calendar-event me-2"></i>Kelola Acara',
        'subtitle' => 'Tambahkan, edit, dan hapus acara program studi',
        'actions' => [
            [
                'url' => '#modalTambahAcara',
                'label' => 'Tambah Acara',
                'class' => 'btn-primary',
                'icon' => 'bi-plus-lg',
                'modal' => true     // ⭐ Tambahkan ini
            ]
        ]
    ])

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel --}}
    <div class="card admin-card">
        <div class="card-header bg-secondary text-white">Daftar Acara</div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Penulis</th>
                        <th>Deskripsi</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($acaras as $acara)
                    <tr>
                        <td>{{ $acara->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</td>
                        <td>{{ $acara->penulis }}</td>
                        <td>{{ Str::limit($acara->deskripsi, 80) }}</td>
                        <td class="text-center">

                            {{-- Tombol Edit --}}
                            <button class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditAcara{{ $acara->id }}">
                                Edit
                            </button>

                            {{-- Tombol Hapus --}}
                            <form action="{{ url('admin/acara/'.$acara->id) }}"
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus acara ini?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEditAcara{{ $acara->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form action="{{ url('admin/acara/'.$acara->id) }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf @method('PUT')

                                    <div class="modal-header bg-warning text-white">
                                        <h5 class="modal-title">Edit Acara</h5>
                                        <button type="button" class="btn-close"
                                            data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label">Judul</label>
                                            <input type="text" name="judul"
                                                   class="form-control"
                                                   value="{{ $acara->judul }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal"
                                                   class="form-control"
                                                   value="{{ $acara->tanggal }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Penulis</label>
                                            <input type="text" name="penulis"
                                                   class="form-control"
                                                   value="{{ $acara->penulis }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $acara->deskripsi }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Foto (Opsional)</label>
                                            <input type="file" name="foto"
                                                   class="form-control" accept="image/*">
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit"
                                            class="btn btn-warning">Update</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-3">Belum ada acara.</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

{{-- Modal Tambah Acara --}}
<div class="modal fade" id="modalTambahAcara" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ url('admin/acara') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Acara</h5>
                    <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
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
                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
