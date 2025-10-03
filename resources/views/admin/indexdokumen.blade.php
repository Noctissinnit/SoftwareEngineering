@extends('layouts.app')

@section('content')
<div class="container my-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">RPS MATAKULIAH</h1>
        <p class="text-muted">Program Studi Software Engineering - Universitas Pignatelli Triputra</p>
    </div>

    {{-- Daftar Semester --}}
    <div class="row g-4">
        @for ($i = 1; $i <= 8; $i++)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white fw-bold">
                        Semester {{ $i }}
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Daftar RPS Mata Kuliah Semester {{ $i }} masih kosong.</p>
                        <ul class="list-group list-group-flush">
                            {{-- nanti tambahin data matkul disini --}}
                        </ul>
                    </div>
                </div>
            </div>
        @endfor
    </div>

</div>
@endsection
