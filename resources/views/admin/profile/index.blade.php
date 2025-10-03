@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-primary mb-4 text-center">
                        <i class="bi bi-person-circle me-2"></i> Profil Saya
                    </h3>

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
</div>

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
