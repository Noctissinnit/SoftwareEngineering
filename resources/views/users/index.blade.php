@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Daftar Mahasiswa & Dosen</h3>

    <div class="row">

        @foreach($users as $user)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">

                <div class="card-body text-center">

                    {{-- Foto Profil --}}
                    <img src="{{ $user->profile_photo 
                        ? asset('storage/' . $user->profile_photo) 
                        :  asset('images/se.png') }}"
                        class="rounded-circle mb-3"
                        width="100" height="100">

                    <h6 class="fw-bold">{{ $user->name }}</h6>

                    <small class="d-block text-muted">
                        NIM: {{ $user->nim ?? '-' }}
                    </small>

                    <small class="d-block text-muted">
                        Angkatan: {{ $user->angkatan ?? '-' }}
                    </small>

                    <a href="{{ route('users.show', $user->id) }}" 
                       class="btn btn-primary btn-sm mt-3">
                        Lihat Profil
                    </a>

                </div>

            </div>
        </div>
        @endforeach

    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>
@endsection
