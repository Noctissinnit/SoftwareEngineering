@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h4>Galeri</h4>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">+ Tambah Gambar</a>
    </div>

    <div class="row">
        @foreach ($galeri as $item)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" height="180" style="object-fit: cover;">
                    <div class="card-body">
                        <h6>{{ $item->title }}</h6>

                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.galeri.destroy', $item->id) }}"
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
