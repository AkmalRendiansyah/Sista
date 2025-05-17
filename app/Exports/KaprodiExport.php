<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\v_kaprodi;

class KaprodiExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return v_kaprodi::select('id', 'name', 'email', 'nidn')->get();
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
