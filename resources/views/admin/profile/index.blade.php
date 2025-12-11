@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

    <x-admin-header :title="'Edit Profil Saya'" :subtitle="'Perbarui informasi profil Anda'" />

    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="admin-card">

                    {{-- Alert Success --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Alert Error --}}
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    
                        {{-- Foto Profil --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto Profil</label>
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('images/se.png') }}" 
                                    alt="Foto Profil" class="rounded-circle border me-3" 
                                    width="80" height="80" style="object-fit: cover;">
                                <div>
                                    <input type="file" name="profile_photo" class="form-control">
                                    <small class="text-muted">Format: JPG, PNG (max 2MB)</small>
                                </div>
                            </div>
                        </div>
                    {{-- Form --}}
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control" 
                                    value="{{ old('name', $user->name) }}" placeholder="Masukkan nama">
                            </div>
                        </div>


                        {{-- Tombol --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
