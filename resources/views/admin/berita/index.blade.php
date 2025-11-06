@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold text-primary mb-4">Kelola Berita</h1>

    {{-- Tombol Tambah Berita --}}
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#beritaModal"
        onclick="openTambahModal()">
        + Tambah Berita
    </button>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel Daftar Berita --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">Daftar Berita</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beritas as $berita)
                    <tr>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning" 
                                onclick="openEditModal({{ $berita->id }}, '{{ addslashes($berita->judul) }}', '{{ addslashes($berita->isi) }}')">
                                Edit
                            </button>
                            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus berita ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-3">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah/Edit Berita --}}
<div class="modal fade" id="beritaModal" tabindex="-1" aria-labelledby="beritaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="beritaForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="methodField" name="_method" value="POST">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="beritaModalLabel">Tambah Berita</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Berita</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Berita</label>
                        <textarea name="isi" id="isi" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar (Opsional)</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<script>
    // Inisialisasi Summernote
    document.addEventListener("DOMContentLoaded", function() {
        $('#isi').summernote({
            height: 200,
            placeholder: 'Tulis isi berita di sini...'
        });
    });

    // Fungsi untuk membuka modal tambah berita
    function openTambahModal() {
        const form = document.getElementById('beritaForm');
        form.action = "{{ route('admin.berita.store') }}";
        document.getElementById('methodField').value = 'POST';
        document.getElementById('beritaModalLabel').textContent = 'Tambah Berita';
        form.reset();
        $('#isi').summernote('code', '');
    }

    // Fungsi untuk membuka modal edit berita
    function openEditModal(id, judul, isi) {
        const form = document.getElementById('beritaForm');
        form.action = `/admin/berita/${id}`;
        document.getElementById('methodField').value = 'PUT';
        document.getElementById('beritaModalLabel').textContent = 'Edit Berita';
        document.getElementById('judul').value = judul;
        $('#isi').summernote('code', isi);
        const modal = new bootstrap.Modal(document.getElementById('beritaModal'));
        modal.show();
    }
</script>
@endsection
