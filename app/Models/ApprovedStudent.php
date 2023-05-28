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
    
    protected $table = 'approved_students';

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

    public function studentLoad()
    {
        return $this->hasMany('App\Models\StudentLoad', 'student_id','id');
    }
    
}
