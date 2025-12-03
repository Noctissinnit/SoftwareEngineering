@extends('layouts.main')

@section('content')

<style>
    /* Title Section */
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

    /* Card Styling */
    .event-card {
        border-radius: 10px;
        border: none;
        overflow: hidden;
        transition: transform .3s ease, box-shadow .3s ease;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
    }

    .event-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .event-card img {
        height: 220px;
        object-fit: cover;
        width: 100%;
    }

    .event-date {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .event-card .btn-primary {
        background-color: #03378c;
        border-color: #03378c;
    }

    .event-card .btn-primary:hover {
        background-color: #0056d2;
    }

    /* Responsive */
    @media(max-width: 768px) {
        .page-title-section h1 {
            font-size: 2.2rem;
        }
    }
</style>

{{-- Header Page --}}
<section class="page-title-section">
    <div class="container">
        <h1>Acara Terbaru</h1>
        <p class="mt-2" style="opacity: 0.9;">Kumpulan acara terbaru Program Studi Software Engineering</p>
    </div>
</section>

{{-- List Acara --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            @forelse($acaras as $acara)
                <div class="col-md-6 col-lg-4">
                    <div class="card event-card h-100">

                        {{-- Foto Acara --}}
                        @if($acara->foto)
                            <img src="{{ asset('storage/' . $acara->foto) }}" alt="{{ $acara->judul }}">
                        @else
                            <img src="{{ asset('images/noimage.jpg') }}" alt="No Image">
                        @endif

                        {{-- Body --}}
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold">
                                <a href="{{ route('acara.detail', $acara->id) }}" class="text-dark text-decoration-none">
                                    {{ Str::limit($acara->judul, 70) }}
                                </a>
                            </h5>

                            <p class="event-date mb-2">
                                <i class="bi bi-calendar-event"></i>
                                {{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}
                            </p>

                            <p class="flex-grow-1 text-muted">
                                {{ Str::limit(strip_tags($acara->deskripsi), 120) }}
                            </p>

                            <a href="{{ route('acara.detail', $acara->id) }}" class="btn btn-primary mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <h4 class="text-muted">Belum ada acara yang tersedia.</h4>
                </div>
            @endforelse

        </div>

        {{-- Pagination jika dibutuhkan --}}
        {{-- <div class="mt-4">
            {{ $acaras->links() }}
        </div> --}}
    </div>
</section>

@endsection
