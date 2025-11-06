@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold text-primary mb-3">{{ $berita->judul }}</h1>
    <p class="text-muted">Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}</p>

    @if($berita->gambar)
        <img src="{{ asset('storage/'.$berita->gambar) }}" class="img-fluid rounded mb-4" alt="{{ $berita->judul }}">
    @endif

    <div class="fs-5">
        {!! nl2br(e($berita->isi)) !!}
    </div>
</div>
@endsection
