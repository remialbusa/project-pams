<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class ApprovedStudent extends Model
{
    use HasFactory;
    use UUID;
    protected $fillable = ['id'];
    
    protected $table = 'approved_students';

    public function enrolledSchoolYear()
    {
        return $this->belongsTo('App\Models\SchoolYearEnrollee', 'student_id', 'student_id');
    }

    public function getFirstPeriodID()
    {
        return $this->belongsTo(Subject::class, 'first_period_sub', 'id');
    }

    public function currentProgram()
    {
        return $this->belongsTo('App\Models\Program', 'program');
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

    public function studentLoad()
    {
        return $this->hasMany('App\Models\StudentLoad', 'student_id','student_id');
    }
    
}
