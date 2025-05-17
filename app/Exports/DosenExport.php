<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Dosen; // Ganti dengan path model dosen Anda
use App\Models\v_dosen;

class DosenExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return v_dosen::select('id', 'name', 'email', 'nidn')->get();
    }

    public function headings(): array
    {
        return [
            'no',
            'name',
            'email',
            'nidn',
        ];
    }
}