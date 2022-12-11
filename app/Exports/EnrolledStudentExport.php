<?php

namespace App\Exports;

use App\Models\EnrolledStudent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnrolledStudentExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(EnrolledStudent::getAllStudents());
    }
    
    public function headings():array
    {
        return[
            'id',
            'student_type',
            'student_id',
            'last_name',
            'first_name',
            'middle_name',
            'vaccination_status',
            'email',
            'gender',
            'birth_date',
            'mobile_no',
            'fb_acc_name',
            'region',
            'province',
            'city',
            'baranggay',
            'program',
            'first_period_sub',
            'second_period_sub',
            'third_period_sub',
            'first_period_sched',
            'second_period_sched',
            'third_period_sched',
            'first_period_adviser',
            'second_period_adviser',
            'third_period_adviser'
        ];
    }
}
