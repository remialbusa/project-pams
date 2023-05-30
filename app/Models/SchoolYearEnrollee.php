<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYearEnrollee extends Model
{
    use HasFactory;

    public $table = 'school_year_enrollees';

    protected $fillable = [
        'student_id', 
        'school_year_id',
        'enrolled_student_table_id',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\EnrolledStudent', 'student_id', 'student_id');
    }

    public function enrolledStudentById()
    {
        return $this->belongsTo('App\Models\EnrolledStudent', 'enrolled_student_table_id');
    }
}
