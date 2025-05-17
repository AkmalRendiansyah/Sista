<?php

namespace App\Imports;

use App\Models\v_kaprodi;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class KaprodiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Cek jika email atau NIDN sudah ada
        $existingkaprodi = v_kaprodi::where('email', $row['email'])->orWhere('nidn', $row['nidn'])->first();

        if ($existingkaprodi) {
            // Handle jika email atau NIDN sudah ada (misalnya, lewati atau laporkan)
            
            return null; // Mengembalikan null akan menandakan untuk melewatkan baris ini
        }

        // Hash password sebelum menyimpan ke database
        $hashedPassword = Hash::make($row['password']);

        // Menyimpan data menggunakan model v_kaprodi
        $kaprodi = new v_kaprodi([
            'name'     => $row['name'],
            'nidn'     => $row['nidn'],
            'email'    => $row['email'],
            'password' => $hashedPassword,
            'role'     => $row['role'] ?? 'kaprodi', // Nilai default 'kaprodi' untuk role jika tidak ada
        ]);

        // Simpan data jika tidak ada duplikat
        if (!$existingkaprodi) {
            $kaprodi->save();
        }

        return $kaprodi;
    }
}
