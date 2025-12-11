@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

    @php
        $actions = [
            ['url' => route('admin.portfolio.create'), 'label' => '+ Tambah Portofolio', 'class' => 'btn-primary']
        ];
    @endphp

    <x-admin-header :title="'Daftar Portofolio'" :subtitle="'Kelola semua portofolio pengguna'" :actions="$actions" />

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Mahasiswa/Dosen</th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Link</th>
                        <th>GitHub</th>
                        <th width="130px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($portfolios as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->user->name }}</td>
                            <td>{{ $p->title }}</td>

                            <td>
                                @if($p->pdf)
                                    <a href="{{ asset('storage/'.$p->pdf) }}" target="_blank" class="badge bg-danger">PDF</a>
                                @endif

                                @if($p->image)
                                    <a href="{{ asset('storage/'.$p->image) }}" target="_blank" class="badge bg-info">Gambar</a>
                                @endif
                            </td>

                            <td>
                                @if($p->link)
                                    <a href="{{ $p->link }}" target="_blank">Visit</a>
                                @endif
                            </td>

                            <td>
                                @if($p->github)
                                    <a href="{{ $p->github }}" target="_blank">Github</a>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.portfolio.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('admin.portfolio.destroy', $p->id) }}" method="POST" class="d-inline-block"
                                      onsubmit="return confirm('Hapus portofolio ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada portofolio</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
