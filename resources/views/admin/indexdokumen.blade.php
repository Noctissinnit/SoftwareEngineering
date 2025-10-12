@extends('layouts.app')

@section('content')
<div class="container my-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Rencana Pembelajaran Semester</h1>
        <p class="text-muted">Program Studi Software Engineering - Universitas Pignatelli Triputra</p>
    </div>

    {{-- Form Tambah RPS --}}
    <form action="{{ route('rps.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="nama_matkul" class="form-control" placeholder="Nama Mata Kuliah" required>
            </div>
            <div class="col-md-2">
                <select name="semester" class="form-control" required>
                    @for($i=1;$i<=8;$i++)
                        <option value="{{ $i }}">Semester {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <input type="file" name="file_rps" class="form-control" accept=".pdf,.doc,.docx">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Tambah RPS</button>
            </div>
        </div>
    </form>

    {{-- Tab Semester --}}
    <ul class="nav nav-tabs mb-4 justify-content-center" id="semesterTab" role="tablist">
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
            {{-- Semester 1-8 --}}
            <div class="tab-pane fade {{ $i == 1 ? 'show active' : '' }}" id="semester{{ $i }}" role="tabpanel" aria-labelledby="semester{{ $i }}-tab">
                <div class="table-responsive shadow-sm">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>RPS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rps[$i] ?? [] as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_matkul }}</td>
                                <td class="text-center">
                                    @if($item->file_rps)
                                        <a href="{{ asset('storage/' . $item->file_rps) }}" target="_blank" class="btn btn-sm btn-info">Lihat RPS</a>
                                    @else
                                        <span class="text-muted">Belum ada file</span>
                                    @endif
                                    <form action="{{ route('rps.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data RPS.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endfor
    </div>

</div>
@endsection
