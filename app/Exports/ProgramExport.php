<?php

namespace App\Exports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProgramExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Program::getAllPrograms());
    }

    public function headings():array
    {
        return[
            'id',
            'code',
            'degree',
            'program',
            'description',
        ];
    }
}
