@extends('layouts.main')

@section('content')
    <section class="hero-section text-white"
        style="background: linear-gradient(135deg, #03378c 0%, #0056d2 100%);
               padding: 100px 0; width: 100vw;
               position: relative; left: 50%; right: 50%;
               margin-left: -50vw; margin-right: -50vw; overflow: hidden;">
        <div class="container position-relative">
            <div class="row align-items-center position-relative" style="z-index:2;">
                <div class="col-md-6 text-start">
                    <h1 class="display-4 fw-bold mb-3">
                        <span style="color:#EEC643;">Program Studi</span> Software Engineering
                    </h1>
                    <p class="lead mb-5">Mempersiapkan lulusan yang unggul, kreatif & profesional berbasis teknologi informasi.</p>
                    <a href="#" class="btn px-5 py-3 fw-semibold shadow-sm"
                       style="background-color:#EEC643; color:#ffffff; border:none; transition: all 0.3s ease;">
                       Kenali Kami Lebih Dalam
                    </a>
                </div>

                <div class="col-md-6 text-center position-relative">
                    <img src="{{ asset('images/newrpl.png') }}" 
                         alt="Logo Kampus" 
                         class="img-fluid"
                         style="max-height: 420px; width: auto; object-fit: contain; filter: drop-shadow(0 0 25px rgba(255,255,255,0.4));">
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
                        <div class="stat-card p-4 border rounded shadow-sm d-flex flex-column align-items-center"
                             style="border-top: 4px solid #EEC643;">
                            <i class="bi {{ $stat['icon'] }} fs-1 mb-2" style="color: #EEC643;"></i>
                            <h2 class="stat-number fw-bold" style="color: #03378c; font-size: 2.5rem;">{{ $stat['number'] }}</h2>
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
                        <div class="card h-100 shadow-sm">
                            @if($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;">
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
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">{{ $acara->judul }}</h5>
                                <p class="card-text text-muted mb-1"><i class="bi bi-calendar-event"></i> {{ $acara->tanggal->format('d M Y') }}</p>
                                <p class="card-text">{{ Str::limit(strip_tags($acara->deskripsi), 100) }}</p>
                                <a href="{{ route('acara.show', $acara->id) }}" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
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
