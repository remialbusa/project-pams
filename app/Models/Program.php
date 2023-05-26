<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Program extends Model
{
    use HasFactory;

    public static function getAllPrograms()
    {
        $result = DB::table('programs')
            ->select('id', 'code', 'degree', 'program', 'description','semester','status')
            ->get()
            ->toArray();
        return $result;
    }

    protected $fillable = [
        'id',
        'code',
        'degree',
        'program',
        'description',
        'semester',
        'status'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
