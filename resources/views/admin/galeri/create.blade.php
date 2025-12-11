@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

    <x-admin-header :title="'Tambah Gambar'" :subtitle="'Upload gambar baru untuk galeri'" />

    <div class="admin-card">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
