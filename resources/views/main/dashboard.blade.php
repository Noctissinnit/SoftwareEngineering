@extends('layouts.main')

@section('content')
<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #03378c 0%, #0056d2 100%);
        padding: 100px 0;
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        overflow: hidden;
        color: white;
    }
    .hero-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.3); /* overlay */
        z-index: 1;
    }
    .hero-section .container > .row {
        position: relative;
        z-index: 2;
        animation: fadeInUp 1s ease forwards;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: none;
        }
    }
    .hero-section a.btn {
        background-color: #EEC643;
        color: #ffffff;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .hero-section a.btn:hover {
        background-color: #f3d558;
        box-shadow: 0 4px 12px rgba(238, 198, 67, 0.6);
    }
    .hero-section img {
        max-height: 420px;
        width: auto;
        object-fit: contain;
        filter: drop-shadow(0 0 25px rgba(255,255,255,0.4));
    }

    /* Statistik Section */
    .stat-card {
        border-top: 4px solid #EEC643;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stat-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(238, 198, 67, 0.4);
    }
    .stat-number {
        color: #03378c;
        font-size: 2.5rem;
    }
    .stat-card i {
        color: #EEC643;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    /* Card Images for Berita & Acara */
    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 0.375rem 0.375rem 0 0;
    }

    /* Card Styling */
    .card {
        border-radius: 0.5rem;
        box-shadow: 0 2px 12px rgb(0 0 0 / 0.1);
        transition: box-shadow 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 10px 25px rgb(0 0 0 / 0.15);
    }

    /* Buttons in Cards */
    .btn-sm {
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .btn-sm.btn-primary:hover,
    .btn-sm.btn-outline-primary:hover {
        filter: brightness(110%);
    }

    /* Responsive fixes */
    @media (max-width: 768px) {
        .hero-section {
            padding: 60px 0;
        }
        .hero-section h1.display-4 {
            font-size: 2.5rem;
        }
        .hero-section img {
            max-height: 300px;
            margin-top: 30px;
        }
    }
</style>

<section class="hero-section text-white">
    <div class="container position-relative">
        <div class="row align-items-center position-relative">
            <div class="col-md-6 text-start">
                <h1 class="display-4 fw-bold mb-3">
                    <span style="color:#EEC643;">Program Studi</span> Software Engineering
                </h1>
                <p class="lead mb-5">Mempersiapkan lulusan yang unggul, kreatif & profesional berbasis teknologi informasi.</p>
                <a href="#" class="btn px-5 py-3 fw-semibold shadow-sm">
                    Kenali Kami Lebih Dalam
                </a>
            </div>
            <div class="col-md-6 text-center position-relative">
                <img src="{{ asset('images/newrpl.png') }}" alt="Logo Kampus" class="img-fluid">
            </div>
        </div>
    </div>
</section>

{{-- Statistik Mahasiswa & Dosen --}}
<section class="info-stats py-5">
    <div class="container">
        <div class="row text-center g-4">
            @php
                $stats = [
                    ['icon' => 'bi-people-fill', 'number' => $mahasiswaCount, 'label' => 'Mahasiswa Aktif'],
                    ['icon' => 'bi-person-badge-fill', 'number' => $dosenCount, 'label' => 'Dosen & Tenaga Pengajar'],
                    ['icon' => 'bi-laptop-fill', 'number' => '3', 'label' => 'Laboratorium IT & Jaringan'],
                    ['icon' => 'bi-graph-up-arrow', 'number' => '100%', 'label' => 'Lulusan Bekerja (1 tahun)']
                ];
            @endphp

            @foreach($stats as $stat)
                <div class="col-md-3">
                    <div class="stat-card p-4 border rounded shadow-sm d-flex flex-column align-items-center">
                        <i class="bi {{ $stat['icon'] }}"></i>
                        <h2 class="stat-number fw-bold">{{ $stat['number'] }}</h2>
                        <p class="stat-label text-muted mb-0">{{ $stat['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Berita Terbaru --}}
<section class="berita-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Berita Terbaru</h2>
            <p class="text-muted">Lima berita terbaru dari Program Studi</p>
        </div>
        <div class="row">
            @forelse ($beritaTerbaru as $berita)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $berita->judul }}</h5>
                            <p class="card-text text-muted">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                            <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada berita.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- Acara Terbaru --}}
<section class="acara-section py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Acara Terbaru</h2>
            <p class="text-muted">Lima acara terbaru yang diselenggarakan</p>
        </div>
        <div class="row">
            @forelse ($acaraTerbaru as $acara)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($acara->foto)
                            <img src="{{ asset('storage/'.$acara->foto) }}" class="card-img-top" alt="{{ $acara->judul }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $acara->judul }}</h5>
                            <p class="card-text text-muted mb-1"><i class="bi bi-calendar-event"></i> {{ $acara->tanggal->format('d M Y') }}</p>
                            <p class="card-text">{{ Str::limit(strip_tags($acara->deskripsi), 100) }}</p>
                            <a href="{{ route('acara.detail', $acara->id) }}" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada acara.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
