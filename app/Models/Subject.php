<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            ->select('id', 'code', 'program', 'subject', 'unit', 'period', 'semester', 'available_slots')
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
}
