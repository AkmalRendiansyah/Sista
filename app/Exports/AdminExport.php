<?php

namespace App\Exports;

use App\Models\v_admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class AdminExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return v_admin::select('id', 'name', 'email', 'nip')->get();
    }

    public function headings(): array
    {
        return [
            'no',
            'name',
            'email',
            'nip',
        ];
    }
}

