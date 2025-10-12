<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
          return new Mahasiswa([
                'nama' => $row['nama'],          // sesuai kolom di Excel
                'nim' => $row['nim'],
                'semester' => $row['semester'] ?? 1,
                'foto' => null,
            ]);
    }
}
