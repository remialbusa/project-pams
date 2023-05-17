<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdmissionOfficerController;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'program',
        'subject',
        'unit',
        'period',
        'available_slots'
    ];

    public static function getAllSubjects()
    {
        $result = DB::table('subjects')
            ->select('id', 'code', 'program', 'subject', 'unit', 'period', 'semester','no_of_students', 'available_slots')
            ->get()
            ->toArray();
        return $result;
    }

    public function getProgramID()
    {
        return $this->belongsTo(Program::class, 'program', 'id');
    }

    public function getSchoolYearId()
    {
        return $this->belongsTo(Program::class, 'semester', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function pendingStudents()
    {
        return $this->belongsTo(PendingStudent::class, 'first_period_sub', 'second_period_sub', 'third_period_sub');
    }

    public function approvedStudents()
    {
        return $this->belongsTo(ApprovedStudent::class, 'first_period_sub', 'second_period_sub', 'third_period_sub');
    }

    public function enrolledStudents()
    {

        return $this->belongsTo(EnrolledStudent::class, 'first_period_sub', 'second_period_sub', 'third_period_sub');
    }
}
