@extends('layouts.app')

@section('content')

<div class="container-fluid admin-page">

    @include('admin._header', [
        'title' => '<i class="bi bi-newspaper me-2"></i>Kelola Berita',
        'subtitle' => 'Tambahkan, edit, dan hapus berita program studi',
        'actions' => [
            ['url' => '#tambahBeritaModal', 'label' => '+ Tambah Berita', 'class' => 'btn-primary', 'icon' => 'bi-plus-lg']
        ]
    ])

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel Daftar Berita --}}
    <div class="card admin-card">
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
                            <a href="{{ route('berita.edit', $berita) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('berita.destroy', $berita) }}" method="POST" class="d-inline">
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

{{-- Modal Tambah Berita --}}
<div class="modal fade" id="tambahBeritaModal" tabindex="-1" aria-labelledby="tambahBeritaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="tambahBeritaLabel">Tambah Berita</h5>
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
                    <button type="submit" class="btn btn-success">Simpan Berita</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- Optional: untuk mempercantik textarea pakai Summernote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#isi').summernote({
            height: 150,
            placeholder: 'Tulis isi berita di sini...'
        });
    });
</script>
@endsection
