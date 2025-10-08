@extends('layouts.app')
@section('content')

<head>
    ...
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
</head>


<div class="container my-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Profil Dosen</h1>
    </div>

   

    {{-- Tombol Tambah --}}
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahDosen">Tambah Dosen</button>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambahDosen" tabindex="-1">
      <div class="modal-dialog">
        <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Dosen</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="text" name="name" class="form-control mb-2" placeholder="Nama Dosen" required>
              <input type="file" name="photo" class="form-control mb-2" accept="image/*">
              <select name="role" class="form-control mb-2" required>
                  <option value="dosen">Dosen</option>
                  <option value="kaprodi">Kaprodi</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    {{-- Tabel Dosen --}}
    <table class="table mt-4">
      <thead>
        <tr>
          <th>Foto</th>
          <th>Nama</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($dosens as $dosen)
        <tr>
          <td>
            @if($dosen->photo)
              <img src="{{ asset('storage/' . $dosen->photo) }}" width="60" class="rounded-circle">
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
            {{-- Tombol Edit dan Hapus --}}
            <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
