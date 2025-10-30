<h1 class="mb-4 fw-bold text-primary">
    <i class="bi bi-calendar-event me-2"></i> Daftar Acara Software Engineering UPITRA
</h1>

{{-- Tombol Tambah Acara --}}
<div class="text-end mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAcara">
        <i class="bi bi-plus-lg"></i> Tambah Acara
    </button>
</div>

{{-- Tabel Data Acara --}}
<div class="card">
    <div class="card-header">
        <i class="bi bi-list-ul me-2"></i> Data Acara
    </div>
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Nama Acara</th>
                        <th>Deskripsi Singkat</th>
                        <th width="15%">Tanggal</th>
                        <th width="10%">Jam</th>
                        <th width="20%">Tempat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($acaras as $acara)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $acara->nama_acara }}</td>
                        <td>{{ Str::limit($acara->deskripsi, 80) }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</td>
                        <td class="text-center">{{ $acara->jam_acara }}</td>
                        <td>{{ $acara->tempat_acara }}</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#modalEditAcara{{ $acara->id }}" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <form action="{{ route('acara.destroy', $acara->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-action" title="Hapus" onclick="return confirm('Hapus acara ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($acaras->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">
                            <i class="bi bi-exclamation-circle me-1"></i> Belum ada data acara.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
