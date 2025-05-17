<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\v_dosen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class DosenImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Cek jika email atau NIDN sudah ada
        $existingDosen = v_dosen::where('email', $row['email'])->orWhere('nidn', $row['nidn'])->first();

        if ($existingDosen) {
            // Handle jika email atau NIDN sudah ada (misalnya, lewati atau laporkan)
            
            return null; // Mengembalikan null akan menandakan untuk melewatkan baris ini
        }

        // Hash password sebelum menyimpan ke database
        $hashedPassword = Hash::make($row['password']);

        // Menyimpan data menggunakan model v_dosen
        $dosen = new v_dosen([
            'name'     => $row['name'],
            'nidn'     => $row['nidn'],
            'email'    => $row['email'],
            'password' => $hashedPassword,
            'role'     => $row['role'] ?? 'dosen', // Nilai default 'dosen' untuk role jika tidak ada
        ]);

        // Simpan data jika tidak ada duplikat
        if (!$existingDosen) {
            $dosen->save();
        }

        return $dosen;
    }
}
