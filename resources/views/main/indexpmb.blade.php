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

    /* Card Style */
    .content-card {
        border-radius: 12px;
        padding: 40px 25px;
        background: #ffffff;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        transition: 0.3s;
    }

    .content-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }

    .btn-primary {
        background-color: #0056d2;
        border-color: #0056d2;
        padding: 10px 28px;
        font-size: 1.1rem;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #03378c;
        border-color: #03378c;
    }
</style>

{{-- ----------- HEADER ----------- --}}
<section class="page-title-section">
    <h1>Pendaftaran Mahasiswa & Mahasiswi Baru</h1>
    <p class="mt-2" style="opacity:0.9;">
        Program Studi Software Engineering - Universitas Pignatelli Triputra
    </p>
</section>

{{-- ----------- CONTENT ----------- --}}
<div class="container my-5">
    <div class="content-card text-center">
        <h3 class="mb-4 fw-semibold" style="color:#03378c;">Pendaftaran PMB sudah dibuka!</h3>

        <a href="https://pmb.upitra.ac.id/" class="btn btn-primary px-4">
            Daftar Sekarang
        </a>
    </div>
</div>

@endsection
