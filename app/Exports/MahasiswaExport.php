<?php

namespace App\Exports;

use App\Models\v_mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class MahasiswaExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return v_mahasiswa::select('id', 'name', 'email', 'nim','id_prodi')->get();
    }

    public function headings(): array
    {
        return [
            'no',
            'name',
            'email',
            'nim',
            'id_prodi',
        ];
    }
}

