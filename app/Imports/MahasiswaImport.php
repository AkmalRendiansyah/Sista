<?php

namespace App\Imports;

use App\Models\v_mahasiswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Cek jika email atau NIDN sudah ada
        $existingmahasiswa = v_mahasiswa::where('email', $row['email'])->orWhere('nim', $row['nim'])->first();

        if ($existingmahasiswa) {
            // Handle jika email atau NIDN sudah ada (misalnya, lewati atau laporkan)
            
            return null; // Mengembalikan null akan menandakan untuk melewatkan baris ini
        }

        // Hash password sebelum menyimpan ke database
        $hashedPassword = Hash::make($row['password']);

        // Menyimpan data menggunakan model v_mahasiswa
        $mahasiswa = new v_mahasiswa([
            'name'     => $row['name'],
            'nim'     => $row['nim'],
            'id_prodi'     => $row['prodi'],
            'email'    => $row['email'],
            'password' => $hashedPassword,
            'role'     => $row['role'] ?? 'mahasiswa', // Nilai default 'mahasiswa' untuk role jika tidak ada
        ]);

        // Simpan data jika tidak ada duplikat
        if (!$existingmahasiswa) {
            $mahasiswa->save();
        }

        return $mahasiswa;
    }
}
