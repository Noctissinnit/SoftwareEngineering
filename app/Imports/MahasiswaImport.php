<?php

namespace App\Imports;


use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
          return new User([
                'nomor_induk' => $row['nama'],          
                'nim' => $row['nim'],
                'angkatan' => $row['angkatan'] ?? 1,
                'photo' => null,
            ]);
    }
}
