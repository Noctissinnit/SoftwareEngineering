@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="fw-bold mb-4">Edit Portofolio</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Pilih User</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($users as $u)
                            <option value="{{ $u->id }}" {{ $portfolio->user_id == $u->id ? 'selected' : '' }}>
                                {{ $u->name }} ({{ $u->role }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ $portfolio->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control">{{ $portfolio->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">File Sekarang</label>

                    @if($portfolio->pdf)
                        <a href="{{ asset('storage/'.$portfolio->pdf) }}" target="_blank" class="badge bg-danger">PDF</a>
                    @endif

                    @if($portfolio->image)
                        <a href="{{ asset('storage/'.$portfolio->image) }}" target="_blank" class="badge bg-info">Gambar</a>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ganti PDF</label>
                        <input type="file" name="pdf" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ganti Gambar</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link Portofolio</label>
                    <input type="text" name="link" class="form-control" value="{{ $portfolio->link }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link Github</label>
                    <input type="text" name="github" class="form-control" value="{{ $portfolio->github }}">
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
