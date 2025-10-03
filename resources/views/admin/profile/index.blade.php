@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil Saya</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label>Foto Profil</label><br>
            @if($user->profile_photo)
                <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Foto Profil" width="100" class="mb-2">
            @endif
            <input type="file" name="profile_photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
