@extends('layouts.app')

@section('content')

<div class="container-fluid admin-page">

    @include('admin._header', [
        'title' => '<i class="bi bi-journal-bookmark me-2"></i>Daftar Mata Kuliah',
        'subtitle' => 'Program Studi Software Engineering - Universitas Pignatelli Triputra',
    ])

    {{-- Form Tambah RPS --}}
    <div class="card mb-4 admin-card">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-plus-circle me-2"></i>Tambah Mata Kuliah
        </div>
        <div class="card-body">
            <form action="{{ route('admin.rps.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_matkul" class="form-control" placeholder="Contoh: Pemrograman Web" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Semester</label>
                        <select name="semester" class="form-control" required>
                            @for($i=1;$i<=8;$i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">File Mata Kuliah (PDF/DOC)</label>
                        <input type="file" name="file_rps" class="form-control" accept=".pdf,.doc,.docx">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tab Semester --}}
    <ul class="nav nav-tabs mb-4" id="semesterTab" role="tablist">
        @for ($i = 1; $i <= 8; $i++)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $i == 1 ? 'active' : '' }}" id="semester{{ $i }}-tab" data-bs-toggle="tab" data-bs-target="#semester{{ $i }}" type="button" role="tab" aria-controls="semester{{ $i }}" aria-selected="{{ $i == 1 ? 'true' : 'false' }}">
                    Semester {{ $i }}
                </button>
            </li>
        @endfor
    </ul>

    <div class="tab-content" id="semesterTabContent">

        @for ($i = 1; $i <= 8; $i++)
            <div class="tab-pane fade {{ $i == 1 ? 'show active' : '' }}" id="semester{{ $i }}" role="tabpanel" aria-labelledby="semester{{ $i }}-tab">
                <div class="card admin-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-list-check me-2"></i>Daftar Mata Kuliah - Semester {{ $i }}</span>
                        <span class="badge bg-light text-dark">{{ count($rps[$i] ?? []) }} Mata Kuliah</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th width="25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($rps[$i] ?? [] as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_matkul }}</td>
                                            <td class="text-center">
                                                @if($item->file_rps)
                                                    <a href="{{ asset('storage/' . $item->file_rps) }}" target="_blank" class="btn btn-sm btn-info btn-action me-1" title="Lihat File">
                                                        <i class="bi bi-eye"></i> Lihat
                                                    </a>
                                                @else
                                                    <span class="text-muted">Belum ada file</span>
                                                @endif
                                                <form action="{{ route('admin.rps.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger btn-action" title="Hapus" onclick="return confirm('Yakin hapus RPS ini?')">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-3">
                                                <i class="bi bi-exclamation-circle me-1"></i> Belum ada data RPS untuk semester ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

</div>
@endsection
