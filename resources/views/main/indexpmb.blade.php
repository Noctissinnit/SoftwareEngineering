@extends('layouts.main')

@section('content')
    <section class="pmb-section py-5">
        <div class="container">
            <h1 class="mb-4" style="color: #03378c;">Pendaftaran Mahasiswa Baru (PMB)</h1>
            <p class="fs-5 mb-4">
                Selamat datang di halaman Pendaftaran Mahasiswa Baru Program Studi Sistem Informasi. Silakan isi formulir di bawah ini untuk mendaftar sebagai calon mahasiswa.
            </p>

            <form action="#" method="POST" class="pmb-form" style="max-width: 600px;">
                @csrf
                <div class="mb-3">
                    <label for="fullname" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="0812xxxxxx" required>
                </div>

                <div class="mb-3">
                    <label for="program" class="form-label">Program Studi</label>
                    <select class="form-select" id="program" name="program" required>
                        <option value="" disabled selected>Pilih program studi</option>
                        <option value="sistem-informasi">Sistem Informasi</option>
                        <option value="teknik-informatika">Teknik Informatika</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary px-4">Daftar Sekarang</button>
            </form>
        </div>
    </section>
@endsection
