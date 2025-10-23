@extends('layouts.main')

@section('content')
<div class="container my-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Rencana Pembelajaran Semester</h1>
        <p class="text-muted">Program Studi Software Engineering - Universitas Pignatelli Triputra</p>
    </div>

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
                                        <button class="btn btn-sm btn-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalNomorInduk"
                                                data-file="{{ asset('storage/' . $item->file_rps) }}">
                                            Lihat RPS
                                        </button>
                                    @else
                                        <span class="text-muted">Belum ada file</span>
                                    @endif
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

{{-- Modal Masukkan Nomor Induk --}}
<div class="modal fade" id="modalNomorInduk" tabindex="-1" aria-labelledby="modalNomorIndukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formNomorInduk" class="modal-content" target="_blank" method="POST" action="{{ route('rps.verify-nomor') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalNomorIndukLabel">Masukkan Nomor Induk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="file_rps" id="fileRpsInput">
                <div class="mb-3">
                    <label for="nomor_induk" class="form-label">Nomor Induk</label>
                    <input type="text" name="nomor_induk" id="nomor_induk_modal" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lihat RPS</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Isi file URL ke modal ketika tombol diklik
    var modalNomorInduk = document.getElementById('modalNomorInduk');
    modalNomorInduk.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var fileUrl = button.getAttribute('data-file');
        var input = modalNomorInduk.querySelector('#fileRpsInput');
        input.value = fileUrl;
    });
</script>
@endpush
