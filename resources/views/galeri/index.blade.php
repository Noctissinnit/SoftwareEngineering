@extends('layouts.main')

@section('content')

<style>
    /* ----------- HEADER ----------- */
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

    /* ----------- GALERI GRID ----------- */
    .gallery-grid {
        column-count: 4;
        column-gap: 1.2rem;
    }
    @media(max-width: 1200px) { .gallery-grid { column-count: 3; } }
    @media(max-width: 768px)  { .gallery-grid { column-count: 2; } }
    @media(max-width: 576px)  { .gallery-grid { column-count: 1; } }

    /* ----------- ITEM ----------- */
    .gallery-item {
        position: relative;
        margin-bottom: 1.2rem;
        break-inside: avoid;
        border-radius: 14px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 4px 18px rgba(0,0,0,0.15);
        transition: .3s ease;
        background: #fff;
    }
    .gallery-item img {
        width: 100%;
        border-radius: 14px;
        transition: transform .4s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
        filter: brightness(0.7);
    }

    /* ----------- OVERLAY ----------- */
    .gallery-overlay {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 16px;
        background: linear-gradient(to top, rgba(0,0,0,0.75), transparent);
        color: #fff;
        opacity: 0;
        transform: translateY(20px);
        transition: .35s ease;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
        transform: translateY(0);
    }

    .gallery-title {
        font-size: 17px;
        font-weight: 700;
    }
    .gallery-desc {
        font-size: 13px;
        opacity: .85;
        margin-top: 4px;
    }

</style>

{{-- ----------- HEADER ----------- --}}
<section class="page-title-section">
    <h1>Galeri</h1>
    <p class="mt-2" style="opacity:0.9;">Kegiatan & Dokumentasi Program Studi Software Engineering</p>
</section>

{{-- ----------- CONTENT ----------- --}}
<div class="container py-5">

    <div class="gallery-grid">
        @foreach ($galeri as $item)
            <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#modalImage"
                 data-image="{{ asset('storage/' . $item->image) }}"
                 data-title="{{ $item->title }}"
                 data-desc="{{ $item->description }}">

                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                <div class="gallery-overlay">
                    <div class="gallery-title">{{ $item->title }}</div>
                    <div class="gallery-desc">{{ $item->description }}</div>
                </div>

            </div>
        @endforeach
    </div>

</div>

{{-- ----------- MODAL PREVIEW GAMBAR ----------- --}}
<div class="modal fade" id="modalImage" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius:14px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalImageTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="modalImageSrc" src="" class="img-fluid rounded" style="max-height:70vh; object-fit:contain;">
                <p class="mt-3 text-muted" id="modalImageDesc"></p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const modalImage = document.getElementById('modalImage');

    modalImage.addEventListener('show.bs.modal', function (event) {
        const item = event.relatedTarget;
        document.getElementById('modalImageSrc').src   = item.getAttribute('data-image');
        document.getElementById('modalImageTitle').textContent = item.getAttribute('data-title');
        document.getElementById('modalImageDesc').textContent  = item.getAttribute('data-desc');
    });
</script>
@endpush
