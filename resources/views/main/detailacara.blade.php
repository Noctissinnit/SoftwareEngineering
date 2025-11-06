
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                @if($acara->foto)
                    <img src="{{ asset('storage/' . $acara->foto) }}" alt="{{ $acara->judul }}" class="card-img-top" style="max-height:350px;object-fit:cover;">
                @endif
                <div class="card-body">
                    <h2 class="card-title">{{ $acara->judul }}</h2>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }} | {{ $acara->penulis }}</p>
                    <div class="card-text">{!! nl2br(e($acara->deskripsi)) !!}</div>
                    <a href="{{ route('berita') }}" class="btn btn-secondary mt-3">Kembali ke daftar event</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection