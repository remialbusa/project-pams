<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLoad extends Model
{
    use HasFactory;

    public $table = 'student_loads';

    protected $fillable = [
        'subject_id',
        'student_id', 
        'school_year_id',
        'adviser',
        'period',
        'program',
        'semester',
        'sub_sched',
    ];
}
