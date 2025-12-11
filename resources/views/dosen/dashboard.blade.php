@extends('layouts.app')

@section('content')
<div class="container mt-4 admin-page">

	<x-admin-header :title="'Dashboard Dosen'" :subtitle="'Ringkasan cepat aktivitas dan data penting'" />

	<div class="row g-3">
		<div class="col-md-4">
			<div class="admin-card">
				<h6 class="mb-2">Profil</h6>
				<div class="d-flex align-items-center">
					<img src="{{ auth()->user()->profile_photo ? asset('storage/'.auth()->user()->profile_photo) : asset('images/se.png') }}" class="rounded-circle me-3" width="64" height="64" style="object-fit:cover;">
					<div>
						<div class="fw-bold">{{ auth()->user()->name }}</div>
						<small class="text-muted">{{ auth()->user()->email }}</small>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="row g-3">
				<div class="col-md-4">
					<div class="admin-card text-center">
						<h5>{{ number_format($mahasiswaCount ?? 0) }}</h5>
						<small class="text-muted">Jumlah Mahasiswa</small>
					</div>
				</div>
				<div class="col-md-4">
					<div class="admin-card text-center">
						<h5>{{ number_format($portfolioCount ?? 0) }}</h5>
						<small class="text-muted">Total Portofolio</small>
					</div>
				</div>
				<div class="col-md-4">
					<div class="admin-card text-center">
						<h5>{{ number_format($recentBerita->count() ?? 0) }}</h5>
						<small class="text-muted">Berita Terbaru</small>
					</div>
				</div>
			</div>

			<div class="mt-3">
				<div class="admin-card">
					<h6>Portofolio Terbaru</h6>
					@if($recentPortfolios && $recentPortfolios->count())
						<div class="list-group list-group-flush">
							@foreach($recentPortfolios as $p)
								<div class="d-flex justify-content-between align-items-center py-2 border-bottom">
									<div>
										<div class="fw-semibold">{{ $p->title }}</div>
										<small class="text-muted">oleh {{ $p->user->name ?? '—' }}</small>
									</div>
									<div>
										<a href="{{ asset('storage/'.($p->file_path ?? '')) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
									</div>
								</div>
							@endforeach
						</div>
					@else
						<p class="text-muted mb-0">Belum ada portofolio terbaru.</p>
					@endif
				</div>
			</div>
		</div>
	</div>

</div>
@endsection