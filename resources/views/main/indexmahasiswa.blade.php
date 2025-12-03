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

    /* ----------- CARD STYLE GLOBAL ----------- */
    .custom-card {
        border-radius: 10px;
        border: none;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        transition: .3s ease;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 28px rgba(0,0,0,0.15);
    }

    .student-item {
        background: #f8f9fa;
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding: 12px;
        transition: .3s ease;
    }

    .student-item:hover {
        background: #eef3ff;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .student-photo {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #03378c;
    }

    .student-placeholder {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #6c757d;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        border: 3px solid #03378c;
    }

    .card-header-custom {
        background: #03378c;
        color: white;
        font-weight: 600;
        font-size: 1.2rem;
        text-align: center;
        padding: 14px;
    }

</style>

{{-- ----------- HEADER ----------- --}}
<section class="page-title-section">
    <div class="container">
        <h1>Mahasiswa dan Mahasiswi</h1>
        <p class="mt-2" style="opacity: 0.9;">Program Studi Software Engineering</p>
    </div>
</section>

{{-- ----------- CONTENT ----------- --}}
<div class="container py-5">

    {{-- PROFIL LULUSAN --}}
    <div class="custom-card mb-5">
        <div class="card-header-custom">
            Profil Lulusan
        </div>
        <div class="card-body text-center">
            <h3 class="text-muted fst-italic">Coming Soon...</h3>
        </div>
    </div>

    {{-- DAFTAR MAHASISWA --}}
    @forelse ($mahasiswas as $angkatan => $listMahasiswa)
        <div class="custom-card mb-4">
            <div class="card-header-custom">
                Angkatan {{ $angkatan ?? 'Tidak Diketahui' }}
            </div>

            <div class="card-body p-4">
                <div class="row g-3">

                    @foreach ($listMahasiswa as $mhs)
                        <div class="col-md-6 col-lg-4">

                            <div class="student-item">

                                {{-- Foto Mahasiswa --}}
                                @if($mhs->foto)
                                    <img src="{{ asset('storage/' . $mhs->foto) }}"
                                         class="student-photo me-3"
                                         alt="{{ $mhs->name }}">
                                @else
                                    <div class="student-placeholder me-3">
                                        {{ strtoupper(substr($mhs->name, 0, 1)) }}
                                    </div>
                                @endif

                                {{-- Detail --}}
                                <div>
                                    <strong>{{ $mhs->name }}</strong><br>
                                    <small class="text-muted">
                                        NIM: {{ $mhs->nim ?? '-' }}
                                    </small>
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    @empty
        <div class="text-center py-5">
            <h4 class="text-muted">Belum ada data mahasiswa.</h4>
        </div>
    @endforelse

</div>

@endsection
