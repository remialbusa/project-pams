<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Subject::getAllSubjects());
    }

    public function headings():array
    {
        return[
            'id',
            'code',
            'program',
            'subject',
            'unit',
            'period',
        ];
    }
}
