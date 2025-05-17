<?php

namespace App\Imports;

use App\Models\v_admin;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class AdminImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Cek jika email atau NIDN sudah ada
        $existingadmin = v_admin::where('email', $row['email'])->orWhere('nip', $row['nip'])->first();

        if ($existingadmin) {
            // Handle jika email atau NIDN sudah ada (misalnya, lewati atau laporkan)
            
            return null; // Mengembalikan null akan menandakan untuk melewatkan baris ini
        }

        // Hash password sebelum menyimpan ke database
        $hashedPassword = Hash::make($row['password']);

        // Menyimpan data menggunakan model v_admin
        $admin = new v_admin([
            'name'     => $row['name'],
            'nip'     => $row['nip'],
            'email'    => $row['email'],
            'password' => $hashedPassword,
            'role'     => $row['role'] ?? 'admin', // Nilai default 'admin' untuk role jika tidak ada
        ]);

        // Simpan data jika tidak ada duplikat
        if (!$existingadmin) {
            $admin->save();
        }

        return $admin;
    }
}
