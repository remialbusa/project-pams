<?php

namespace App\Exports;

use App\Models\Adviser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InstructorExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Adviser::getAllAdvisers());
    }

    public function headings():array
    {
        return[
            'id',
            'program',
            'title',
            'first_name',
            'middle_name',
            'last_name',
        ];
    }
}
