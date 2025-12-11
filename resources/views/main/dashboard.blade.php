@extends('layouts.main')

@section('content')

<style>
    /* Root Color Style */
    :root {
        --primary: #03378c;
        --primary-light: #0056d2;
        --accent: #EEC643;
        --dark: #1b1e23;
        --muted: #6c757d;
    }

    /* GLOBAL SPACING FIX */
    .section-title {
        font-weight: 700;
        color: var(--primary);
        letter-spacing: 0.5px;
    }

    /* -------------------------------------------------------------
        HERO SECTION (Modern Classy Version)
    ------------------------------------------------------------- */
    .hero-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        padding: 120px 0;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
        margin-right: calc(-50vw + 50%);
        position: relative;
        overflow: hidden;
        color: white;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background: url('{{ asset("images/bg-pattern.png") }}') center/cover;
        opacity: 0.12;
    }

    .hero-glass {
        backdrop-filter: blur(8px);
        background: rgba(255, 255, 255, 0.1);
        padding: 35px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        animation: fadeInUp 1s ease both;
    }

    .hero-section img {
        max-height: 420px;
        filter: drop-shadow(0 0 25px rgba(255,255,255,0.4));
    }

    .hero-btn {
        padding: 12px 35px;
        background: var(--accent);
        color: black;
        font-weight: 600;
        border-radius: 50px;
        border: none;
        transition: .25s;
    }

    .hero-btn:hover {
        background: #ffda63;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(238,198,67,.4);
    }

    /* -------------------------------------------------------------
        STATISTIC CARDS
    ------------------------------------------------------------- */
    .stat-card {
        padding: 30px;
        border-radius: 14px;
        background: white;
        border: 1px solid #eee;
        transition: all .25s ease-in-out;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    }

    .stat-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 36px rgba(0,0,0,0.12);
    }

    .stat-icon {
        font-size: 2.8rem;
        color: var(--accent);
        margin-bottom: 10px;
    }

    .stat-number {
        font-size: 2.4rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 4px;
    }

    .stat-label {
        color: var(--muted);
        font-weight: 500;
    }

    /* -------------------------------------------------------------
        CARDS SECTION (Berita & Acara)
    ------------------------------------------------------------- */
    .card-custom {
        border: none;
        border-radius: 12px;
        box-shadow: 0 3px 18px rgba(0,0,0,0.08);
        transition: .25s;
        overflow: hidden;
    }

    .card-custom:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }

    .card-custom img {
        height: 210px;
        object-fit: cover;
    }

    .btn-more {
        border-radius: 50px !important;
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    /* -------------------------------------------------------------
        RESPONSIVE
    ------------------------------------------------------------- */
    @media(max-width: 768px){
        .hero-section img { max-height: 300px; margin-top: 30px; }
        .hero-glass { padding: 25px; }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

{{-- -------------------------------------------------------------
    HERO SECTION
------------------------------------------------------------- --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6">
                <div class="hero-glass">
                    <h1 class="display-5 fw-bold mb-3">
                        <span style="color: var(--accent)">Program Studi</span><br>
                        Software Engineering
                    </h1>
                    <p class="lead mb-4">
                        Mempersiapkan lulusan unggul, kreatif, dan profesional di bidang Teknologi Informasi.
                    </p>
                    <a href="#" class="hero-btn shadow-sm">Kenali Kami Lebih Dalam</a>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <img src="{{ asset('images/logorplnew.png') }}" alt="Hero Image">
            </div>

        </div>
    </div>
</section>

{{-- -------------------------------------------------------------
    STATISTIK
------------------------------------------------------------- --}}
<section class="py-5">
    <div class="container">
        <div class="row text-center gy-4">
            @php
                $stats = [
                    ['icon'=>'bi-people-fill','num'=>$mahasiswaCount,'label'=>'Mahasiswa Aktif'],
                    ['icon'=>'bi-person-badge-fill','num'=>$dosenCount,'label'=>'Dosen Pengajar'],
                    ['icon'=>'bi-laptop-fill','num'=>3,'label'=>'Laboratorium Informatika'],
                    ['icon'=>'bi-graph-up-arrow','num'=>'100%','label'=>'Lulusan Bekerja (1 tahun)'],
                ];
            @endphp

            @foreach($stats as $stat)
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="stat-icon bi {{ $stat['icon'] }}"></i>
                    <div class="stat-number">{{ $stat['num'] }}</div>
                    <div class="stat-label">{{ $stat['label'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- -------------------------------------------------------------
    BERITA TERBARU
------------------------------------------------------------- --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">Berita Terbaru</h2>
            <p class="text-muted">Lima berita terbaru dari Program Studi</p>
        </div>

        <div class="row g-4">
            @forelse($beritaTerbaru as $berita)
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/'.$berita->gambar) }}" alt="">
                    @endif

                    <div class="card-body">
                        <h5 class="fw-semibold">{{ $berita->judul }}</h5>
                        <p class="text-muted">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                        <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary btn-sm btn-more">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-center text-muted">Belum ada berita.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- -------------------------------------------------------------
    ACARA TERBARU
------------------------------------------------------------- --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">Acara Terbaru</h2>
            <p class="text-muted">Acara paling baru dari Program Studi</p>
        </div>

        <div class="row g-4">
            @forelse($acaraTerbaru as $acara)
            <div class="col-md-4">
                <div class="card card-custom h-100">

                    @if($acara->foto)
                        <img src="{{ asset('storage/'.$acara->foto) }}" alt="">
                    @endif

                    <div class="card-body">
                        <h5 class="fw-semibold">{{ $acara->judul }}</h5>
                        <p class="text-muted mb-1">
                            <i class="bi bi-calendar-event"></i>
                            {{ $acara->tanggal->format('d M Y') }}
                        </p>
                        <p>{{ Str::limit(strip_tags($acara->deskripsi), 100) }}</p>

                        <a href="{{ route('acara.detail', $acara->id) }}" class="btn btn-outline-primary btn-sm btn-more">
                            Selengkapnya
                        </a>
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
