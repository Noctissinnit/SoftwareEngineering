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
        font-size: 2.8rem;
        animation: fadeInDown 1s ease;
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ----------- CARD GALERI ----------- */
    .gallery-card {
        border-radius: 10px;
        border: none;
        overflow: hidden;
        transition: transform .3s ease, box-shadow .3s ease;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        background: #fff;
        cursor: pointer;
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .gallery-card img {
        width: 100%;
        height: 240px;
        object-fit: cover;
    }

    .gallery-overlay {
        background: rgba(3, 55, 140, 0.85);
        color: #fff;
        padding: 10px 15px;
        border-radius: 0 0 10px 10px;
    }

    .gallery-title {
        font-size: 1.1rem;
        font-weight: 600;
    }

    .gallery-desc {
        font-size: 0.85rem;
        opacity: .9;
    }

    /* Masonry Grid */
    .gallery-grid {
        column-count: 3;
        column-gap: 1.2rem;
    }

    @media(max-width: 992px) {
        .gallery-grid { column-count: 2; }
    }

    @media(max-width: 576px) {
        .gallery-grid { column-count: 1; }
    }

    .gallery-item {
        break-inside: avoid;
        margin-bottom: 1.2rem;
    }
</style>

{{-- ----------- HEADER ----------- --}}
<section class="page-title-section">
    <div class="container">
        <h1>Galeri</h1>
        <p class="mt-2" style="opacity: 0.9;">Kumpulan dokumentasi kegiatan Program Studi Software Engineering</p>
    </div>
</section>

{{-- ----------- GALERI LIST ----------- --}}
<section class="py-5">
    <div class="container">

        <div class="gallery-grid">

            @foreach ($galeri as $item)
                <div class="gallery-item">

                    <div class="gallery-card">

                        {{-- Foto --}}
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">

                        {{-- Overlay --}}
                        <div class="gallery-overlay">
                            <div class="gallery-title">{{ $item->title }}</div>
                            <div class="gallery-desc">{{ $item->description }}</div>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

@endsection
