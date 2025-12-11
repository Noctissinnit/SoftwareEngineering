@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

    @php
        $actions = [
            ['url' => route('admin.galeri.create'), 'label' => '+ Tambah Gambar', 'class' => 'btn-primary']
        ];
    @endphp

    <x-admin-header :title="'Galeri'" :subtitle="'Kelola foto galeri'" :actions="$actions" />

    <div class="row">
        @foreach ($galeri as $item)
            <div class="col-md-3 mb-4">
                <div class="admin-card">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" height="180" style="object-fit: cover;">
                    <div class="card-body">
                        <h6>{{ $item->title }}</h6>
                        <div class="mt-2">
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
            </div>
        @endforeach
    </div>

</div>
@endsection
