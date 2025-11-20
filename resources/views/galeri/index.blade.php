@extends('layouts.main')

@section('content')

<style>
    /* --- GALERI MASONRY STYLE --- */
    .gallery-grid {
        column-count: 4;
        column-gap: 1rem;
    }

    @media(max-width: 1200px) {
        .gallery-grid { column-count: 3; }
    }

    @media(max-width: 768px) {
        .gallery-grid { column-count: 2; }
    }

    @media(max-width: 576px) {
        .gallery-grid { column-count: 1; }
    }

    .gallery-item {
        position: relative;
        margin-bottom: 1rem;
        break-inside: avoid;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.3s;
        cursor: pointer;
    }

    .gallery-item img {
        width: 100%;
        border-radius: 10px;
        display: block;
        transition: transform 0.4s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.07);
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 10px 14px;
        background: linear-gradient(transparent, rgba(0,0,0,0.7));
        color: #fff;
        font-size: 15px;
        border-radius: 10px;
    }
</style>

<div class="container mt-4">

    <h3 class="mb-4 fw-bold">Galeri</h3>

    <div class="gallery-grid">

        @foreach ($galeri as $item)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $item->image) }}" alt="Foto Galeri">
                <div class="gallery-overlay">
                    <strong>{{ $item->title }}</strong>
                    <div style="font-size: 13px;">{{ $item->description }}</div>
                </div>
            </div>
        @endforeach

    </div>

</div>

@endsection
