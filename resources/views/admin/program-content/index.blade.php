@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

    @php
        $contents = [
            ['key' => 'visi_misi', 'title' => 'Visi & Misi', 'icon' => 'eye'],
            ['key' => 'tujuan', 'title' => 'Tujuan Program Studi', 'icon' => 'target'],
            ['key' => 'akreditasi', 'title' => 'Akreditasi', 'icon' => 'award'],
        ];
    @endphp

    <x-admin-header :title="'Konten Program Studi'" :subtitle="'Kelola visi, misi, tujuan, dan akreditasi'" />

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @foreach($contents as $item)
            <div class="col-md-4 mb-4">
                <div class="admin-card h-100 d-flex flex-column">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-{{ $item['icon'] }} me-2" style="font-size: 1.5rem; color: #03378c;"></i>
                        <h5 class="fw-bold mb-0">{{ $item['title'] }}</h5>
                    </div>

                    <p class="text-muted flex-grow-1">
                        @php
                            $content = $contents[$item['key']] ?? null;
                            if ($content) {
                                $preview = substr(strip_tags($content->content ?? ''), 0, 100);
                                echo $preview . (strlen($preview) >= 100 ? '...' : '');
                            } else {
                                echo 'Belum ada konten';
                            }
                        @endphp
                    </p>

                    <a href="{{ route('admin.program-content.edit', $item['key']) }}" 
                       class="btn btn-primary btn-sm mt-auto">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>

<style>
    .bi { font-size: 1.25rem; }
</style>
@endsection
