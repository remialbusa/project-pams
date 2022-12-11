<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Adviser extends Model
{
    use HasFactory;

    protected $table = 'advisers';
    public static function getAllAdvisers()
    {
        $result = DB::table('advisers')
        ->select('id','program','title','first_name','middle_name','last_name')
        ->get()
        ->toArray();
        return $result;
    }

    public function getStudentID()
    {
        return $this->belongsTo(ApprovedStudent::class, 'user_id', 'id');
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
}
