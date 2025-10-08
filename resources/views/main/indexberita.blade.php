@extends('layouts.main')

@section('content')
    <section class="news-listing py-5">
        <div class="container">
            <h1 class="mb-4" style="color: #03378c;">Berita Terbaru</h1>
            <div class="row g-4">
                @forelse($acaras as $acara)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 rounded overflow-hidden">
                            @if($acara->foto)
                                <img src="{{ asset('storage/' . $acara->foto) }}" alt="{{ $acara->judul }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    <a href="{{ route('berita.detail', $acara->id) }}" class="text-decoration-none text-dark">
                                        {{ Str::limit($acara->judul, 70) }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted small mb-2">{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</p>
                                <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($acara->deskripsi), 120) }}</p>
                                <a href="{{ route('berita.detail', $acara->id) }}" class="mt-auto btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada berita acara tersedia saat ini.</p>
                @endforelse
            </div>

            <div class="mt-4">
                {{-- {{ $newsItems->links() }}  --}}
            </div>
        </div>
    </section>
@endsection