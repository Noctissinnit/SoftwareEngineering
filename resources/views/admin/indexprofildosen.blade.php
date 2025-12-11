@extends('layouts.app')

@section('content')

<div class="container-fluid admin-page">

    @include('admin._header', [
        'title' => '<i class="bi bi-person-badge me-2"></i>Profil Dosen',
        'subtitle' => 'Daftar dosen dan kaprodi Program Studi Software Engineering'
    ])

    {{-- Tombol Tambah --}}
    <div class="mb-4">
        <button class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#modalTambahDosen">
            <i class="bi bi-plus-circle me-1"></i> Tambah Dosen
        </button>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambahDosen" tabindex="-1" aria-labelledby="modalTambahDosenLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahDosenLabel"><i class="bi bi-person-plus me-1"></i>Tambah Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Dosen</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama dosen" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="dosen">Dosen</option>
                                <option value="kaprodi">Kaprodi</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save2 me-1"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Card Daftar Dosen --}}
    <div class="card admin-card">
        <div class="card-header">
            <i class="bi bi-list-ul me-2"></i>Daftar Dosen
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="10%">Foto</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dosens as $dosen)
                            <tr>
                                <td>
                                    @if($dosen->photo)
                                        <img src="{{ asset('storage/' . $dosen->photo) }}" class="foto-dosen" alt="{{ $dosen->name }}">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $dosen->name }}</td>
                                <td>
                                    @if($dosen->role == 'kaprodi')
                                        <span class="badge bg-success">Kaprodi</span>
                                    @else
                                        <span class="badge bg-primary">Dosen</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data dosen ini?')">
                                            <i class="bi bi-trash3"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">
                                    <i class="bi bi-exclamation-circle me-1"></i>Belum ada data dosen.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
