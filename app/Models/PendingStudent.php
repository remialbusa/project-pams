<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class PendingStudent extends Model
{
    use UUID;
    use HasFactory;

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
}
