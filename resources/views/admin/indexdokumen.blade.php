@extends('layouts.app')

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
        {{-- Semester 1 --}}
        <div class="tab-pane fade show active" id="semester1" role="tabpanel" aria-labelledby="semester1-tab">
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
                        <tr>
                            <td class="text-center">1</td>
                            <td>Pengantar Rekayasa Perangkat Lunak</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Agama</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Pengantar Teknologi Informasi</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Matematika Diskrit</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Pancasila</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Business Communication</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>Pemrograman Dasar</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Semester 2 --}}
        <div class="tab-pane fade" id="semester2" role="tabpanel" aria-labelledby="semester2-tab">
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
                        <tr>
                            <td class="text-center">1</td>
                            <td>Statiska & Probabilitas</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Analisis Kebutuhan Perangkat Lunak</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Pemrograman WEB Dasar</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Bahasa Indonesia</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Basis Data</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Algoritma & Struktur Data</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>Kewarganegaraan</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Semester 3 --}}
        <div class="tab-pane fade" id="semester3" role="tabpanel" aria-labelledby="semester3-tab">
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
                        <tr>
                            <td class="text-center">1</td>
                            <td>Proses Perangkat Lunak</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>jaringan Komunikasi Data</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Arsitektur Industri</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Pemrograman Berorientasi Objek</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Pengembangan Kepribadian UPITRA DNA</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                          <tr>
                            <td class="text-center">6</td>
                            <td>Pemrograman WEB Lanjut</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                          <tr>
                            <td class="text-center">7</td>
                            <td>Pemodelan Perangkat Lunak</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">Lihat RPS</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Semester 4-8 --}}
        @for ($i = 4; $i <= 8; $i++)
        <div class="tab-pane fade" id="semester{{ $i }}" role="tabpanel" aria-labelledby="semester{{ $i }}-tab">
            <div class="alert alert-warning mt-4 text-center">
                Daftar RPS Mata Kuliah Semester {{ $i }} masih kosong.
            </div>
        </div>
        @endfor
    </div>

</div>
@endsection
