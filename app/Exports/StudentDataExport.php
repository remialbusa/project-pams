<?php

namespace App\Exports;
use App\Models\SchoolYear;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Concerns\FromCollection;

class StudentDataExport implements FromView, WithEvents
{
    private $school_year_id;

    public function __construct($school_year_id)
    {
        $this->school_year_id = $school_year_id;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->setAutoSize(true);
            },
        ];
    }
    public function view(): View
    {
        if ($this->school_year_id) {
            $school_years = SchoolYear::where('id', $this->school_year_id)->with(['schoolEnrollees' => function ($query) {
                $query->with('enrolledStudentById');
            }])->get();
        } else {
            $school_years = SchoolYear::with(['schoolEnrollees' => function ($query) {
                $query->with('enrolledStudentById');
            }])->get();
        }
        return view('exports.enrolled_students', [
            'school_years' => $school_years
        ]);
    }
}

