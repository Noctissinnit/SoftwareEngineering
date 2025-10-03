@extends('layouts.main')

@section('content')
    <section class="news-listing py-5">
        <div class="container">
            <h1 class="mb-4" style="color: #03378c;">Berita Terbaru</h1>
            <div class="row g-4">
                {{-- @foreach($newsItems as $news)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 rounded overflow-hidden">
                            @if($news->thumbnail)
                                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ Str::limit($news->title, 70) }}</h5>
                                <p class="card-text text-muted small mb-2">{{ $news->created_at->format('d M Y') }}</p>
                                <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                                <a href="{{ url('/berita/' . $news->slug) }}" class="mt-auto btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if($newsItems->isEmpty())
                    <p>Tidak ada berita tersedia saat ini.</p>
                @endif --}}
            </div>

            <div class="mt-4">
                {{-- {{ $newsItems->links() }}  --}}
            </div>
        </div>
    </section>
@endsection
