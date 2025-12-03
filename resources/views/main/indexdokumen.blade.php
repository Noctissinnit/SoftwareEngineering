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

    /* Coming soon card */
    .coming-soon-card {
        border-radius: 12px;
        padding: 50px 20px;
        background: #f8f9fa;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        transition: .3s ease;
        text-align: center;
    }

    .coming-soon-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
</style>

{{-- ----------- HEADER ----------- --}}
<section class="page-title-section">
    <h1>Dokumen</h1>
    <p class="mt-2" style="opacity:0.9;">
        Program Studi Software Engineering - Universitas Pignatelli Triputra
    </p>
</section>

{{-- ----------- CONTENT ----------- --}}
<div class="container py-5">

    <div class="coming-soon-card">
        <h3 class="text-muted fst-italic my-3">Coming Soon...</h3>
        <p class="text-muted">Fitur penyimpanan dan publikasi dokumen sedang dikembangkan.</p>
    </div>

</div>

@endsection
