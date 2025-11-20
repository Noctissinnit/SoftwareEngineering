@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="fw-bold mb-4">Tambah Portofolio</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Pilih User</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">-- Pilih Mahasiswa/Dosen --</option>
                        @foreach ($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->role }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload PDF</label>
                        <input type="file" name="pdf" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload Gambar</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link Portofolio</label>
                    <input type="text" name="link" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link Github</label>
                    <input type="text" name="github" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
