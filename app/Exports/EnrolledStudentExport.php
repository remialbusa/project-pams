<?php

namespace App\Exports;

use App\Models\EnrolledStudent;
use App\Models\SchoolYear;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;

class EnrolledStudentExport implements FromView, WithEvents
{
    public function registerEvents() : array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->setAutoSize(true) ;
            },
        ];
    }  
    public function view(): View
    {
        $school_years = SchoolYear::with(['schoolEnrollees' => function ($query) {
            $query->with('student');
        }])->get();

        return view('exports.enrolled_students', [
            'school_years' => $school_years
        ]);
    }
}
