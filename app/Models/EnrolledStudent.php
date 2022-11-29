<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use Illuminate\Support\Facades\DB;

class EnrolledStudent extends Model
{
    use UUID;
    use HasFactory;

    public static function getAllStudents()
    {
        $result = DB::table('enrolled_students')
        ->select('id','student_type','student_id','last_name','first_name','middle_name','vaccination_status','email','gender','birth_date','mobile_no','fb_acc_name','region','province','city','baranggay','program','first_period_sub','second_period_sub','third_period_sub','first_period_sched','second_period_sched','third_period_sched','first_period_adviser','second_period_adviser','third_period_adviser')
        ->get()
        ->toArray();
        return $result;
    }
}
