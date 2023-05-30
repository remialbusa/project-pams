<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Traits\UUID;

class PendingStudent extends Model
{
    use UUID;
    use HasFactory;

    public static function getAllStudents()
    {
        $result = DB::table('pending_students')
            ->select('id', 'student_type', 'student_id', 'last_name', 'first_name', 'middle_name', 'vaccination_status', 'email', 'gender', 'birth_date', 'mobile_no', 'fb_acc_name', 'region', 'province', 'city', 'baranggay', 'program', 'first_period_sub', 'second_period_sub', 'third_period_sub', 'first_period_sched', 'second_period_sched', 'third_period_sched', 'first_period_adviser', 'second_period_adviser', 'third_period_adviser')
            ->get()
            ->toArray();
        return $result;
    }

    protected $fillable = [
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
        'file',
        'program',
        'first_period_sub',
        'second_period_sub',
        'third_period_sub',
    ];

    public function currentProgram()
    {
        return $this->belongsTo('App\Models\Program', 'program');
    }

    public function getFirstPeriodID()
    {
        return $this->belongsTo(Subject::class, 'first_period_sub', 'id');
    }

    public function getSecondPeriodID()
    {
        return $this->belongsTo(Subject::class, 'second_period_sub', 'id');
    }

    public function getThirdPeriodID()
    {
        return $this->belongsTo(Subject::class, 'third_period_sub', 'id');
    }

    public function getProgramID()
    {
        return $this->belongsTo(Program::class, 'program', 'id');
    }

    public function getSchoolYearId()
    {
        return $this->belongsTo(Program::class, 'semester', 'id');
    }

    public function getStudentData()
    {
        // Customize this query based on the specific data you want to retrieve from the pendingstudent table
        return $this->select('first_period_sub', 'second_period_sub', 'third_period_sub')
            ->where('status', 'pending')
            ->get();
    }

    public function studentLoad()
    {
        return $this->hasMany('App\Models\StudentLoad', 'student_id','id');
    }

    public function enrolledSchoolYear()
    {
        return $this->belongsTo('App\Models\SchoolYearEnrollee', 'id');
    }
}
