@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold text-primary text-center mb-4">Berita Terbaru</h1>

    <div class="row g-4">
        @foreach($beritas as $berita)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                @if($berita->gambar)
                    <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="fw-bold">{{ $berita->judul }}</h5>
                    <p class="text-muted small">{{ $berita->created_at->format('d M Y') }}</p>
                    <p>{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                    <a href="{{ route('berita.show', $berita) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $beritas->links() }}
    </div>
</div>
@endsection
