@extends('layouts.main')

@section('content')

<style>
    /* Header Gradient Section */
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

    .page-title-section p {
        opacity: .9;
        animation: fadeIn 1.5s ease;
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    /* Content Card */
    .content-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 40px 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: .3s ease;
    }

    .content-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .content-card h2 {
        font-weight: 700;
        color: #03378c;
        margin-bottom: 15px;
    }

    .content-card ul li {
        margin-bottom: 12px;
        line-height: 1.6;
    }
</style>

{{-- Header --}}
<section class="page-title-section">
    <div class="container">
        <h1>Visi & Misi</h1>
        <p>Program Studi Software Engineering<br>Universitas Pignatelli Triputra</p>
    </div>
</section>

{{-- Content --}}
<section class="py-5">
    <div class="container">

        <div class="content-card mx-auto">

            {{-- Visi --}}
            <h2 class="text-center">Visi</h2>
            <p class="text-center mb-4">
                Program studi yang unggul dalam bidang rekayasa perangkat lunak, berorientasi global, 
                menjunjung tinggi nilai-nilai integritas dan bersemangat kebhinekaan.
            </p>

            {{-- Misi --}}
            <h2 class="text-center mt-4">Misi</h2>
            <ul>
                <li>Menyelenggarakan program studi Rekayasa Perangkat Lunak secara efektif dan efisien untuk mendukung terlaksananya Tri Dharma perguruan tinggi.</li>
                <li>Menghasilkan sarjana di bidang rekayasa perangkat lunak yang kompeten, solutif, berpola pikir logis dan sistematis, memiliki kedalaman spiritual, menjunjung kemanusiaan, rendah hati, berintegritas dan profesional.</li>
                <li>Menghasilkan penelitian yang unggul, solutif, inovatif dan transformatif bagi masyarakat di bidang rekayasa perangkat lunak.</li>
                <li>Memanfaatkan ilmu rekayasa perangkat lunak yang berdaya guna dan berhasil guna bagi masyarakat.</li>
                <li>Membangun kerja sama dan mengelola jejaring berkelanjutan dengan dunia pendidikan, masyarakat, pemerintah dan industri untuk mewujudkan keunggulan transformatif.</li>
            </ul>

        </div>

    </div>
</section>

@endsection
