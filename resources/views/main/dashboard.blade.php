@extends('layouts.main')

@section('content')
    <section class="hero-section text-white" 
        style="background: linear-gradient(135deg, #03378c 0%, #0056d2 100%);
               padding: 100px 0;
               width: 100vw;
               position: relative;
               left: 50%;
               right: 50%;
               margin-left: -50vw;
               margin-right: -50vw;
               overflow: hidden;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Kolom kiri: teks -->
                <div class="col-md-6 text-start">
                    <h1 class="display-4 fw-bold mb-3">Program Studi Software Engineering</h1>
                    <p class="lead mb-5">Mempersiapkan lulusan yang unggul, kreatif & profesional berbasis teknologi informasi.</p>
                    <a href="#" class="btn btn-light text-primary px-5 py-3 fw-semibold shadow-sm" 
                       style="transition: background-color 0.3s ease;">
                       Kenali Kami Lebih Dalam
                    </a>
                </div>

                <!-- Kolom kanan: logo besar -->
                <div class="col-md-6 text-center position-relative">
                    <img src="{{ asset('images/newrpl.png') }}" 
                         alt="Logo Kampus" 
                         class="img-fluid"
                         style="max-height: 420px; width: auto; object-fit: contain; filter: drop-shadow(0 0 25px rgba(255,255,255,0.4));">
                </div>
            </div>
        </div>
    </section>

    <section class="info-stats py-5">
        <div class="container">
            <div class="row text-center g-4">
                @php
                    $stats = [
                        ['icon' => 'bi-people-fill', 'number' => '50+', 'label' => 'Mahasiswa Aktif'],
                        ['icon' => 'bi-person-badge-fill', 'number' => '30', 'label' => 'Dosen & Tenaga Pengajar'],
                        ['icon' => 'bi-laptop-fill', 'number' => '3', 'label' => 'Laboratorium IT & Jaringan'],
                        ['icon' => 'bi-graph-up-arrow', 'number' => '100%', 'label' => 'Lulusan Bekerja (1 tahun)']
                    ];
                @endphp

                @foreach($stats as $stat)
                    <div class="col-md-3">
                        <div class="stat-card p-4 border rounded shadow-sm d-flex flex-column align-items-center">
                            <i class="bi {{ $stat['icon'] }} fs-1 mb-2" style="color: #03378c;"></i>
                            <h2 class="stat-number fw-bold" style="color: #03378c; font-size: 2.5rem;">{{ $stat['number'] }}</h2>
                            <p class="stat-label text-muted mb-0">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
