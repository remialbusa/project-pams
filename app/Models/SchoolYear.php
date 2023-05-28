<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    public $table = 'school_year';


    public function schoolEnrollees()
    {
        return $this->hasMany('App\Models\SchoolYearEnrollee', 'school_year_id','id');
    }
}
