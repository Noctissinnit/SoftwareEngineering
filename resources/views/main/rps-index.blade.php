@extends('layouts.main')

@section('content')

<style>
    /* ----------- PAGE HEADER ----------- */
    .page-title-section {
        background: linear-gradient(135deg, #03378c 0%, #0056d2 100%);
        padding: 80px 0;
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        color: white;
        text-align: center;
    }

    .page-title-section h1 {
        font-weight: 700;
        font-size: 2.6rem;
        animation: fadeInDown 1s ease;
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Card Wrapper */
    .content-card {
        border-radius: 12px;
        background: #ffffff;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        padding: 30px;
        transition: 0.3s;
    }

    .content-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }
</style>

{{-- ----------- HEADER ----------- --}}
<section class="page-title-section">
    <h1>Daftar Mata Kuliah</h1>
    <p class="mt-2" style="opacity:0.9;">
        Program Studi Software Engineering - Universitas Pignatelli Triputra
    </p>
</section>

{{-- ----------- CONTENT ----------- --}}
<div class="container my-5">

    <div class="content-card">

        {{-- Tab Semester --}}
        <ul class="nav nav-tabs mb-4 justify-content-center" id="semesterTab" role="tablist">
            @for ($i = 1; $i <= 8; $i++)
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link {{ $i == 1 ? 'active' : '' }}"
                        id="semester{{ $i }}-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#semester{{ $i }}"
                        type="button"
                    >
                        Semester {{ $i }}
                    </button>
                </li>
            @endfor
        </ul>

        {{-- Content Semester --}}
        <div class="tab-content" id="semesterTabContent">
            @for ($i = 1; $i <= 8; $i++)
                <div
                    class="tab-pane fade {{ $i == 1 ? 'show active' : '' }}"
                    id="semester{{ $i }}"
                >
                    <div class="table-responsive shadow-sm mt-3">
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
                                                <button
                                                    class="btn btn-sm btn-info"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalNomorInduk"
                                                    data-file="{{ asset('storage/' . $item->file_rps) }}"
                                                >
                                                    Lihat RPS
                                                </button>
                                            @else
                                                <span class="text-muted">Belum ada file</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-3">
                                            Belum ada data Daftar Mata Kuliah.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endfor
        </div>

    </div>
</div>

{{-- ----------- MODAL NOMOR INDUK ----------- --}}
<div class="modal fade" id="modalNomorInduk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formNomorInduk" class="modal-content" method="POST" target="_blank" action="{{ route('rps.verify-nomor') }}">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Masukkan Nomor Induk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="file_rps" id="fileRpsInput">

                <label class="form-label">Nomor Induk</label>
                <input
                    type="text"
                    name="nomor_induk"
                    id="nomor_induk_modal"
                    class="form-control"
                    required
                >
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary px-4">Lihat RPS</button>
            </div>

        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    var modalNomorInduk = document.getElementById('modalNomorInduk');

    modalNomorInduk.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var fileUrl = button.getAttribute('data-file');
        document.getElementById('fileRpsInput').value = fileUrl;
    });
</script>
@endpush
