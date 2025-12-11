@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

    <x-admin-header :title="'Direktori Mahasiswa & Dosen'" :subtitle="'Lihat profil dan portofolio pengguna'" />

    <div class="row">

        @foreach($users as $user)
        <div class="col-md-3 mb-4">
            <div class="admin-card text-center">

                {{-- Foto Profil --}}
                <img src="{{ $user->profile_photo 
                    ? asset('storage/' . $user->profile_photo) 
                    :  asset('images/se.png') }}"
                    class="rounded-circle mb-3"
                    width="100" height="100"
                    style="object-fit: cover;">

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
        @endforeach

    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>
@endsection
