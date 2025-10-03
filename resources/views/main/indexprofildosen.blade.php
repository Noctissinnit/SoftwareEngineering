@extends('layouts.main')

@section('content')
    <section class="profils-dosen py-5">
        <div class="container">
            <h1 class="mb-4" style="color: #03378c;">Daftar Profil Dosen</h1>
            <div class="row g-4">
                @php
                    $dosenList = [
                        (object)[
                            'name' => 'Dr. Ahmad Fauzi, M.Kom',
                            'position' => 'Dosen Senior Sistem Informasi',
                            'photo' => 'images/dosen1.jpg'
                        ],
                        (object)[
                            'name' => 'Ir. Siti Nurhaliza, M.T',
                            'position' => 'Dosen Jaringan dan Telekomunikasi',
                            'photo' => 'images/dosen2.jpg'
                        ],
                        (object)[
                            'name' => 'Budi Santoso, S.Kom, M.Cs',
                            'position' => 'Dosen Pemrograman dan Basis Data',
                            'photo' => 'images/dosen3.jpg'
                        ],
                        (object)[
                            'name' => 'Dr. Lina Marlina, M.Si',
                            'position' => 'Dosen Riset dan Pengembangan Teknologi',
                            'photo' => 'images/dosen4.jpg'
                        ],
                    ];
                @endphp

                @foreach($dosenList as $dosen)
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ asset($dosen->photo) }}" alt="{{ $dosen->name }}" class="card-img-top rounded" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dosen->name }}</h5>
                                <p class="card-text text-muted">{{ $dosen->position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
